self.addEventListener('install', function(event) {
    event.waitUntil(
      caches.open('my-cache').then(function(cache) {
        return cache.addAll([
          '/',
          'register.php',
          'css/reg.css',
          'bootstrap2/css/bootstrap.min.css',
          'bootstrap2/js/jquery-3.5.1.min.js',
          'bootstrap2/js/bootstrap.min.js',

          
        ]);
      })
    );
  });
  
  self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.match(event.request).then(function(response) {
        return response || fetch(event.request);
      })
    );
  });


// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
firebase.initializeApp({
  apiKey: 'AIzaSyAJ-v10cFQ0qDr7r8NH5rsh5cnuAx8FJXo',
  authDomain: 'safe-spend.firebaseapp.com',
  projectId: 'safe-spend',
  storageBucket: 'safe-spend.appspot.com',
  messagingSenderId: 'G-KFXYMH1Y4Q',
  appId: '1:315089001979:web:c10e376cdb32043f22bf5e',
  measurementId: 'G-KFXYMH1Y4Q',
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();