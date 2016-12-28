import React from 'react';

class Inbox extends React.Component {

    constructor() {
        console.log(2);
        super();
    }

    render() {
        console.log(222);
        return (
            <div>Inbox</div>
        );
    }
}

export default Inbox;