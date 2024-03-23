
const firebaseConfig = {
    apiKey: "AIzaSyAzc6eRhMmTLog_3f75JtuoV4YA366GMOE",
    authDomain: "osn-services.firebaseapp.com",
    databaseURL: "https://osn-services.firebaseio.com",
    projectId: "osn-services",
    storageBucket: "osn-services.appspot.com",
    messagingSenderId: "313357881332",
    appId: "1:313357881332:web:9e34becb57d7d91a4873a1",
    measurementId: "G-340NTHPJ2V"
};

// Initialize Firebase
const firebaseapp = firebase.initializeApp(firebaseConfig);

var storage = firebaseapp.storage();

var pathReference = storage.ref('videos');

pathReference.child('movie.mp4').getDownloadURL()
    .then((url) => {
        // `url` is the download URL for 'images/stars.jpg'

        // This can be downloaded directly:
        var xhr = new XMLHttpRequest();
        xhr.responseType = 'blob';
        xhr.setRequestHeader('Access-Control-Allow-Origin','*');
        xhr.onload = (event) => {
            var blob = xhr.response;
        };
        xhr.open('GET', url);
        xhr.send();

        // Or inserted into an <img> element
        var img = document.getElementById('asdfgh');
        img.setAttribute('src', url);
    })
    .catch((error) => {
        // Handle any errors
    });

// console.log(pathReference)