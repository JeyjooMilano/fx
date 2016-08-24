<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Parsed json data</title>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>

<body>

<div ng-app="myApp" ng-controller="customersCtrl"> 

<!--p>My welcome: <b>{{myWelcome}}</b></p>
<p>My data: <b>{{myData}}</b></p-->

<ul>
  <li ng-repeat="x in myData">
    {{ x.id + ' ' + x.Rate }}
  </li>
</ul>

</div>

<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
  $http.get("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%20in%20(%22CHFEUR%22,%20%22CHFUSD%22,%20%22CHFGBP%22,%20%22CHFDKK%22,%20%22CHFNOK%22,%20%22CHFSEK%22,%22EURCHF%22,%20%22EURUSD%22,%20%22EURGBP%22,%20%22EURDKK%22,%20%22EURNOK%22,%20%22EURSEK%22,%22USDCHF%22,%20%22USDEUR%22,%20%22USDGBP%22,%20%22USDDKK%22,%20%22USDNOK%22,%20%22USDSEK%22,%22GBPCHF%22,%20%22GBPEUR%22,%20%22GBPUSD%22,%20%22GBPDKK%22,%20%22GBPNOK%22,%20%22GBPSEK%22,%22DKKCHF%22,%20%22DKKEUR%22,%20%22DKKUSD%22,%20%22DKKGBP%22,%20%22DKKNOK%22,%20%22DKKSEK%22,%22NOKCHF%22,%20%22NOKEUR%22,%20%22NOKUSD%22,%20%22NOKGBP%22,%20%22NOKDKK%22,%20%22NOKSEK%22)&format=json&env=store://datatables.org/alltableswithkeys").then(function(response) {
	  $scope.myWelcome = response.statusText;
	  $scope.myData = response.data.query.results.rate;
  });
});
</script>


</body>
</html>
