import React from 'react';

import './LoggedInLayout.less';

class LoggedInLayout extends React.Component {
    render() {
        return (
            <div className='LoggedInLayout'>
                <div className='LoggedInLayout__content'>
                    {this.props.children}
                </div>
            </div>
        );
    }
}
export default LoggedInLayout;
