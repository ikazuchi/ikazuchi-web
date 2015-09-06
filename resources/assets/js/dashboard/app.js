(function() {
    angular.module('ikazuchi', [
        'ngResource',
        'angular-flot'
    ])
        .controller('DashboardCtrl', ['$resource', '$q', function($resource, $q) {
            var ctrl = this;

            ctrl.periods = {
                '30m': '30 minutes',
                '60m': '60 minutes',
                '3h': '3 hours',
                '6h': '6 hours',
                '12h': '12 hours',
                '24h': '24 hours',
                '7d': '7 days'
            };

            ctrl.chartOptions = {
                temperature: {
                    chart: {
                        type: 'lineChart',
                        x: function(d) { return Number(moment(d.device_timestamp).toDate()); },
                        y: function(d) { return d.temperature; },
                        xAxis: {
                            axisLabel: 'Time'
                        },
                        yAxis: {
                            axisLabel: 'Temperature (ÅãC)'
                        }
                    }
                },
                humidity: {
                    chart: {
                        type: 'lineChart',
                        x: function(d) { console.log(d); return Number(moment(d.device_timestamp).toDate()); },
                        y: function(d) { console.log(d); return d.humidity; },
                        xAxis: {
                            axisLabel: 'Time'
                        },
                        yAxis: {
                            axisLabel: 'Humidity (%)'
                        }
                    }
                },
                waterLevel: {
                    chart: {
                        type: 'lineChart',
                        x: function(d) { return Number(moment(d.device_timestamp).toDate()); },
                        y: function(d) { return d.water_level; },
                        xAxis: {
                            axisLabel: 'Time'
                        },
                        yAxis: {
                            axisLabel: 'Water Level (cm)'
                        }
                    }
                }
            };

            ctrl.params = {
                period: '7d'
            };

            ctrl.chartData = {};

            var Device = {
                list: $resource('/api/devices/:deviceId', null, {
                    query: { method: 'GET', isArray: true }
                }),
                data: {
                    periodic: $resource('/api/devices/:deviceId/query', null, {
                        query: {method: 'GET', isArray: true}
                    }),
                    current: $resource('/api/devices/:deviceId/now', null, {
                        query: {method: 'GET'}
                    }),
                    top: $resource('/api/devices/:deviceId/top', null, {
                        query: {method: 'GET'}
                    })
                }
            };

            var _getAllDevices = function() {
                ctrl.devices = Device.list.query();

                return ctrl.devices.$promise;
            };

            var _getDevice = function(deviceId) {
                ctrl.currentDevice.info = Device.list.get({ deviceId: deviceId });

                return ctrl.currentDevice.info.$promise;
            };

            var _getDevicePeriodicData = function(deviceId, queryParams) {
                var _params = { deviceId: deviceId };
                angular.extend(_params, queryParams);

                ctrl.currentDevice.data.periodic = Device.data.periodic.query(_params);

                return ctrl.currentDevice.data.periodic.$promise;
            };

            var _getDeviceCurrentData = function(deviceId) {
                ctrl.currentDevice.data.current = Device.data.current
                    .get({ deviceId: deviceId });

                return ctrl.currentDevice.data.current.$promise;
            };

            var _getDeviceTopData = function(deviceId, queryParams) {
                var _params = { deviceId: deviceId };
                angular.extend(_params, queryParams);

                ctrl.currentDevice.data.top = Device.data.top
                    .get(_params);

                return ctrl.currentDevice.data.top.$promise;
            };

            var _changePeriod = function(period) {
                ctrl.params.period = period;
            };

            var _formatForChart = function(label, data) {
                var _data = data.map(function(datum) {
                    var timestamp = Number(new Date(datum.device_timestamp));
                    switch(label) {
                        case 'Temperature':
                            return [timestamp, parseInt(datum.temperature)];
                        case 'Humidity':
                            return [timestamp, parseInt(datum.humidity)];
                        case 'Water Level':
                            return [timestamp, parseInt(datum.water_level)];
                    }
                    return [timestamp, datum.id];
                });

                ctrl.chartData[label] = [{
                    label: label,
                    data: _data
                }];

                console.log(ctrl.chartData[label]);
            };

            ctrl.getAllDevices = function() {
                return _getAllDevices();
            };

            ctrl.getDevice = function(deviceId) {
                ctrl.currentDevice = {
                    $resolved: false,
                    data: {}
                };
                return $q.all([
                    _getDevice(deviceId),
                    _getDevicePeriodicData(deviceId, ctrl.params),
                    _getDeviceTopData(deviceId, ctrl.params)
                ]).then(function() {
                    _formatForChart('Temperature', ctrl.currentDevice.data.periodic);
                    _formatForChart('Humidity', ctrl.currentDevice.data.periodic);
                    _formatForChart('Water Level', ctrl.currentDevice.data.periodic);
                    ctrl.currentDevice.$resolved = true;
                });
            };

            ctrl.changePeriod = function(period) {
                _changePeriod(period);
                ctrl.getDevice(ctrl.currentDevice.info.id);
            };

            ctrl.getAllDevices();
        }])
        .controller('AlertsCtrl', ['$resource', function($resource) {
            var ctrl = this;

            var Alerts = $resource('/api/alerts/:deviceId', null, {
                query: { method: 'GET', isArray: true }
            });

            var Top = $resource('/api/devices/:deviceId/top', null, {
                query: {method: 'GET'}
            });

            ctrl.alerts = Alerts.query();

            ctrl.top = Top.get({ deviceId: 1 });
        }]);
})();
