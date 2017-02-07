// import http from '../node_modules/http-server/*';

var app = angular.module('app', []);
app.controller('mainCtrl', function ($scope, $http, $location, $window) {
    //сохранения формы
$scope.response = {};
$scope.save = function (answer, answerForm){
    if(answerForm.$valid){
        $http.post("./php/server.php", answer).then(function (answ) {
            $scope.response=answ;
            console.log($scope.response);
        });
    }
};


//отображение основного блока
$scope.title = 'Телефоны';
$scope.fpage = true;
$scope.spage = false;
/*Ajax Query phones*/
$http.get('phones/phones.json').then(function (data, status, headers, config) {
    // $scope.data1 = data.data.goods;
    //console.log('This is Data:', data.data, '\n\n This is Status:', data.status, '\n\n This is Headers:', data.headers, '\n\n This is Config:', data.config);
    $scope.phones = data.data;
}, function () {
    console.log('error');
});
$scope.templete = function (this_obj) {
    //console.log(this_obj.phone.id);
    //$window.location.href = "templates/phone_details.html";
    $http.get('phones/descript.json').then(function (data, status, headers, config) {
        //console.log('This is Data:', data.data, '\n\n This is Status:', data.status, '\n\n This is Headers:', data.headers, '\n\n This is Config:', data.config);
        //$scope.ctrl = data.data;
        // console.log(this_obj.phone.id);
        //переберает весь json и ищет совпадение с первым json с первого http запроса
        for (var i = 0; i < (data.data).length; i++) {
            if (((data.data)[i]).id == (this_obj.phone.id)) {
                console.log(((data.data)[i]).id);
                $scope.ctrl = (data.data)[i];
            }
        }
        // $scope.fpage = !$scope.fpage;
        // $scope.spage = !$scope.spage;
        // console.log($scope.ctrl[0].images);
    }, function () {
        console.log('error');
    });
};
// console.log(ctrl);
$scope.hide = function () {

};


});