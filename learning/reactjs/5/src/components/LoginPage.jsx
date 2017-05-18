import React from 'react';
import RaisedButton from 'material-ui/RaisedButton';
import SessionActions from '../actions/SessionAction';
import SessionStore from '../stores/SessionStore';

import './LoginPage.less';

function getStateFromFlux() {
    return {
        isLoggedIn: SessionStore.isLoggedIn()
    };
}

class LoginPage extends React.Component {

    _onChange() {
        this.setState(getStateFromFlux());
    }

    static getInitialState() {
        return getStateFromFlux();
    };

    componentDidMount() {
        SessionStore.addChangeListener(this._onChange.bind(this));
    }

    componentWillUpdate(nextPros, nextState) {
        if (nextState.isLoggedIn) {
            this.context.router.replace('/about');
        }
    }

    componentWillUnmount() {
        SessionStore.removeChangeListener(this._onChange.bind(this))
    }

    static handleLogin() {
        SessionActions.authorize();
    };

    render () {
        return (
            <div className="LoginPage">
                <div className="LoginPage__banner">
                    <div className="LoginPage_text">
                        <h1>Almost Google tasks</h1>
                        <p>Organise your life!</p>
                        <RaisedButton className='login-button' label='Log in with Google' onClick={this.constructor.handleLogin} />
                    </div>
                    <img src="img/desk.png" alt="Desk" className="LoginPage__image"/>
                </div>
            </div>
        );
    };
}

export default LoginPage;