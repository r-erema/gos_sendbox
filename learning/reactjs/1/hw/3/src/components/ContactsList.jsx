var React = require('react');
var Contact = require('./Contact.jsx');

require('./ContactsList.css');

var contacts = [
            {
                id : 1,
                name : 'SpongeBob SquarePants',
                phoneNumber : '+1235445897',
                image : 'https://upload.wikimedia.org/wikipedia/en/thumb/4/47/Spongebob-squarepants.svg/175px-Spongebob-squarepants.svg.png',
                address : 'Pineapple',
                email : 'SpongeBob@BikiniBottom.com'
            },
            {
                id : 2,
                name : 'Patrick Star',
                phoneNumber : '+9856963265',
                image : 'https://upload.wikimedia.org/wikipedia/en/thumb/7/7e/Patrick_Star.png/220px-Patrick_Star.png',
                address : 'Rock',
                email : 'PatrickStar@BikiniBottom.com'
            },
            {
                id : 3,
                name : 'Squidward Tentacles',
                phoneNumber : '+2553611599',
                image : 'https://upload.wikimedia.org/wikipedia/en/thumb/a/ac/Squidward.png/100px-Squidward.png',
                address : 'Totem',
                email : 'SquidwardTentacles@BikiniBottom.com'
            },
            {
                id : 4,
                name : 'Mr. Krabs',
                phoneNumber : '+8545963258',
                image : 'https://upload.wikimedia.org/wikipedia/en/6/63/MrKrabs.png',
                address : 'Anchor',
                email : 'Krabs@BikiniBottom.com'
            },
            {
                id : 5,
                name : 'Sandy Cheeks',
                phoneNumber : '+5635221343',
                image : 'https://upload.wikimedia.org/wikipedia/en/e/e6/Sandy_Cheeks.png',
                address : 'Flask',
                email : 'SandyCheeks@BikiniBottom.com'
            },
            {
                id : 6,
                name : 'Plankton',
                phoneNumber : '+4576204725',
                image : 'https://upload.wikimedia.org/wikipedia/en/d/da/Sheldon_Plankton.png',
                address : 'Chum Bucket',
                email : 'Plankton@BikiniBottom.com'
            }
        ];

var ContactsList = React.createClass({

            getInitialState :function () {
                return {displayedContacts : contacts};
            },

            handleSearch : function (event) {
                var searchQuery = event.target.value.toLowerCase();
                var displayedContacts = contacts.filter(function (element) {
                    var searchValue = element.name.toLowerCase();
                    return searchValue.indexOf(searchQuery) !== -1;
                });

                this.setState({
                    displayedContacts : displayedContacts
                });

            },

            render : function () {
                return (
                    <div className="contacts">
                        <input type="text" className="search-field" onChange={this.handleSearch} />
                        <ul className="contacts-list">
                            {
                                this.state.displayedContacts.map(function (element) {
                                    return <Contact
                                            key={element.id}
                                            name={element.name}
                                            phoneNumber={element.phoneNumber}
                                            image={element.image}
                                            address={element.address}
                                            email={element.email}
                                    />
                                })
                            }
                        </ul>
                    </div>
                );
            }
        });

module.exports = ContactsList;