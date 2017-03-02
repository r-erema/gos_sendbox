const CLIENT_ID = '390541840953-4erqvtb9njcmvubo22o5uu9rfpjoptv3.apps.googleusercontent.com';
const SCOPES = ['https://www.googleapis.com/auth/tasks', 'https://www.googleapis.com/auth/plus.me'];

export default {
    authorize(params) {
        console.log(gapi.auth.authorize);
        return new Promise((resolve, reject) => {
            gapi.auth.authorize(
                {
                    'client_id' : CLIENT_ID,
                    'scope' : SCOPES,
                    'immediate' : params.immediate,
                    'cookie_policy' : 'single_host_origin'
                },
                authResult => {
                    console.log(authResult);
                }
            );
        });
    }
}