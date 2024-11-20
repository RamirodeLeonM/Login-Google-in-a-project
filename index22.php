<!DOCTYPE html>
<html>
<head>
	<title>Prueba conexion login Google</title>
	<meta name="google-signin-client_id" content="261031048473-iidu7s71n3bia0r7n1vhdpub64q7ea4r.apps.googleusercontent.com">
</head>
<body>
<h1>SING IN WITH GOOGLE</h1>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<SCRIPT>
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}

</SCRIPT>

<a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>
</body>
</html>