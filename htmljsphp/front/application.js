var myApp = angular.module('blog', []);

myApp.controller('ExampleController', ['$scope', '$http', "$q", function($scope, $http, $q) {

  $http({
      method: 'GET',
      url: 'http://test.local/htmljsphp/back/comment.json'
  }).then(function successCallback(response, data, status) {
      $scope.tweets = response.data.tweets;

      console.log("succes on the json get");
      console.log("response: ", response);
      console.log("status: ", response.status);
      console.log("data: ", response.data);
      console.log("tweets: ", response.data.tweets);
      console.log("tweet 1: ", response.data.tweets[0]);
      console.log("tweet 2: ", response.data.tweets[1]);
      console.log("tweet 3: ", response.data.tweets[2]);
      console.log("tweet 3: ", response.data.tweets[3]);
      console.log("test: ", $scope.tweets);

      feedthepage($scope.tweets);

  }, function errorCallback(response) {
      console.log("error can't get the JSON file from the server");
      document.getElementById("erreur").innerHTML = "Erreur lors de l'appel du json"
  });

    $scope.list = [];
    /*       $scope.tweet = localStorage.getItem("tweet");       */
    $scope.salut = "";
    $scope.submit = function() {

        editthejson(); //à metre en input l'input
        if ($scope.text) {
            $scope.list.push(this.text);
            /*       localStorage.setItem("tweet", angular.toJson(this.text));       */
            $scope.text = '';

        }

    };


    function feedthepage(x) {
        console.log("feedthepage function, tweets:", x);
        let i = 0;
        for (i = 0; i < x.length; i++) {
            console.log(i);
            $scope.list.push($scope.tweets[i].message);
        }

        console.log("nombre de tweets :", i);
    }




}]);


function submittojs(){

  console.log("salut");
  return false;
}



    function editthejson() {

        $http({
            method: 'POST',
            url: 'feed.json'
        }).then(function successCallback(response, data, status) {
            console.log("salut");
        }, function errorCallback(response) {
            console.log("error can't edit the JSON file on the server");
            document.getElementById("erreur").innerHTML = "Erreur lors de la modification du JSON";
        });
    }



/*
saveToStorage = function() {
    localStorage.setItem("tweet", JSON.stringify(this.text));
}

loadFromStorage = function() {
    this.text = JSON.parse(localStorage.getItem("tweet"));
}  */



/*



$http.get("feed.json").$q.then(function(data, status) {
  $scope.donnees = data;
}).
error(function(data, status) {
  document.getElementById("erreur").innerHTML = "Erreur lors de l'appel du json"
});





*/
