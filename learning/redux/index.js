import {createStore} from 'redux';

let userReducer = (state, action) => {
    if (state === undefined) {
        state = [];
    }
    if (state.type === 'ADD_USER') {
        state.push(action.user);
    }
    return state;
};

let store = createStore(userReducer);

store.dispatch({
    type : 'ADD_USER',
    user : {name : 'Dan'}
});