var React = require('react');

require('./Contact.css');

var Contact = React.createClass({

            getInitialState : function () {
                return {isOpened : false}
            },

            toggleAdditional : function () {
                this.setState({
                    isOpened : !this.state.isOpened
                });
            },

            render : function () {
                var additional = null;
                if (this.state.isOpened) {
                    additional = <div><div>{this.props.address}</div><div>{this.props.email}</div></div>;
                }
                return <li className="contact" onClick={this.toggleAdditional} >
                        <img className="contact-image" src={this.props.image} alt={this.props.name} height="100px" />
                        <div className="contacts-info">
                            <div className="contact-name">{this.props.name}</div>
                            <div className="contact-number">{this.props.phoneNumber}</div>
                            {additional}
                        </div>
                    </li>
            }
        });

module.exports = Contact;