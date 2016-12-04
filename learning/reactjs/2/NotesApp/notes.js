
var Note = React.createClass({
    render : function () {
        var style = {backgroundColor: this.props.color};
        return (
            <div style={style} className="note">
                <span className="delete-note" onClick={this.props.onDelete}>×</span>
                {this.props.children}
            </div>
        );
    }
});

var ColorSelector = React.createClass({

    getInitialState : function () {
        return {
            colors : [
                {
                    value : '#52c452',
                },{
                    value : '#d9dc0a',
                },{
                    value : '#a15dcc',
                },{
                    value : '#5297c4',
                },{
                    value : '#c47a24',
                },{
                    value : '#f35c5c',
                },{
                    value : '#7aabf3',
                },{
                    value : '#1cf391',
                },{
                    value : '#a4a0a6',
                }
            ]
        };
    },

    setColor : function (event) {
        var _color = event.target.getAttribute('data');
        this.state.colors.map(function (color) {
            color.active = color.value === _color;
        });
        this.setState({colors : this.state.colors});
        this.props.onSetColor(_color);

    },

    render : function () {
        var _this = this;
        return <div className="colors-panel">
            {
                this.state.colors.map(function (color) {
                    var style = {backgroundColor: color.value};
                    var classes = 'color-item';
                    if (color.active) {
                        classes += ' active';
                    }
                    return <div style={style} key={color.value} className={classes} data={color.value} onClick={_this.setColor}></div>
                })
            }
            </div>;
    }
});

var NoteEditor = React.createClass({

    getInitialState : function () {
        return {
            text : '',
            color : '#a15dcc'
        };
    },

    handleTextChange : function (event) {
        this.setState({text : event.target.value});
    },

    setColor : function (color) {
        this.state.color = color;
    },

    handleNoteAdd : function () {
        var newNote = {
            text: this.state.text,
            color : this.state.color,
            id : Date.now()
        };

        this.props.onNoteAdd(newNote);
        this.setState({text : ''});
    },

    render : function () {
        return (
            <div className="note-editor">
                <textarea
                    placeholder="Enter your note here..."
                    className="textarea"
                    rows={5}
                    value={this.state.text}
                    onChange={this.handleTextChange}
                />
                <ColorSelector onSetColor={this.setColor}/>
                <button className="add-button" onClick={this.handleNoteAdd}>Add</button>
            </div>
        );
    }
});

var NotesGrid = React.createClass({

    componentDidMount : function () {
        var grid = this.refs.grid;
        this.masonry = new Masonry(grid, {
            itemSelector : '.note',
            columnWidth : 200,
            gutter : 10
        });
    },

    componentDidUpdate : function (prevProps) {
        if (this.props.notes.length !== prevProps.notes.length) {
            this.masonry.reloadItems();
            this.masonry.layout();
        }
    },

    render : function () {
        var onNoteDelete = this.props.onNoteDelete;
        return (
            <div className="notes-grid" ref="grid">
                {
                    this.props.notes.map(function (note) {
                        return (
                                <Note
                                    key={note.id}
                                    onDelete={onNoteDelete.bind(null, note)}
                                    color={note.color}>
                                    {note.text}
                                </Note>
                            )
                    })
                }
            </div>
        );
    }
});

var NotesSearch = React.createClass({

    handleSearch : function (event) {
        this.props.onSearch(event.target.value.toLowerCase());

    },

    render : function () {
        return <input type="text" className="search" placeholder="Search note..." onChange={this.handleSearch}/>
    }
});

var NoteApp = React.createClass({


    getInitialState : function () {
        return {notes : [], disableStorage : false}
    },

    handleNoteAdd : function (newNote) {
        this.handleSearch(null);
        var newNotes = JSON.parse(localStorage.getItem('notes')).slice();
        newNotes.unshift(newNote);
        this.setState({notes : newNotes});
    },

    componentDidMount : function () {
        var localNotes = JSON.parse(localStorage.getItem('notes'));
        if (localNotes) {
            this.setState({notes : localNotes});
        }
    },

    componentDidUpdate : function () {
        if (!this.state.disableStorage) {
            this._updateLocalStorage();
        }
    },

    handleNoteDelete : function (note) {
        var noteId = note.id;
        var newNotes = this.state.notes.filter(function (note) {
            return note.id !== noteId;
        });
        this.setState({notes : newNotes});
    },

    handleSearch : function (searchQuery) {
        if (searchQuery) {
            console.log(searchQuery);
            var notes = this.state.notes.filter(function (element) {
                var searchValue = element.text.toLowerCase();
                return searchValue.indexOf(searchQuery) !== -1;
            });
            this.setState({notes : notes, disableStorage : true});
        } else {
            this.setState({notes : JSON.parse(localStorage.getItem('notes')), disableStorage : false});
        }
    },

    render : function () {
        return (
            <div className="notes-app">
                <h2 className="app-header">NotesApp</h2>
                <NotesSearch onSearch={this.handleSearch} notes={this.state.notes}/>
                <NoteEditor onNoteAdd={this.handleNoteAdd} />
                <NotesGrid notes={this.state.notes} onNoteDelete={this.handleNoteDelete}/>
            </div>
        );
    },

    _updateLocalStorage : function () {
        var notes = JSON.stringify(this.state.notes);
        localStorage.setItem('notes', notes);
    }

});

ReactDOM.render(
    <NoteApp />,
    document.getElementById('mount-point')
);