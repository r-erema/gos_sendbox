const CLIENT_ID = '390541840953-4erqvtb9njcmvubo22o5uu9rfpjoptv3.apps.googleusercontent.com';
const SCOPES = ['https://www.googleapis.com/auth/tasks', 'https://www.googleapis.com/auth/plus.me'];

export default {
    authorize(params) {
        //console.log(gapi.auth2.authorize);
        return new Promise((resolve, reject) => {
            /*gapi.auth2.authorize(
                {
                    'client_id' : CLIENT_ID,
                    'scope' : SCOPES,
                    'immediate' : params.immediate,
                    'cookie_policy' : 'single_host_origin'
                },
                authResult => {
                    //console.log(authResult);
                }
            );*/
            gapi.client.init({
              //discoveryDocs: DISCOVERY_DOCS,
              clientId: CLIENT_ID,
              immediate : params.immediate,
              scope: SCOPES
            }).then(function () {
              // Listen for sign-in state changes.
              gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

              // Handle the initial sign-in state.
              updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
              authorizeButton.onclick = handleAuthClick;
              signoutButton.onclick = handleSignoutClick;
            });
        });


    }
}