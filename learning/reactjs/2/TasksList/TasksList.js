const STATUS_NEW = 'Новая';
const STATUS_DONE = 'Завершена';

const LOCAL_STORAGE_KEY = 'TasksList';

var NoteEditor = React.createClass({

    getInitialState : function () {
        return {
            id : null,
            taskName : null,
            status : null
        };
    },

    handleTextInput : function (event) { this.setState({taskName : event.target.value}); },

    handleAddTask : function () {
        var tasks = getTasksFromStorage() || [];
        tasks.push({taskName : this.state.taskName, status : STATUS_NEW, id : Math.random()});
        localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(tasks));
        this.props.onTaskAdd();
    },

    render : function () {
        return (
            <div>
                <input type="text" placeholder="Название задачи" className="input-text" onChange={this.handleTextInput}/>
                <button onClick={this.handleAddTask}>Добавить</button>
            </div>
        );
    }

});

var Task = React.createClass({

    getInitialState : function () {
        return {
            id : this.props.id,
            taskName : this.props.taskName,
            status : this.props.status
        };
    },

    componentDidUpdate : function () {
        updateTaskInStorage(this.state);
    },

    handleStatus : function (event) {
        this.setState({
            status : event.target.checked ? STATUS_DONE : STATUS_NEW
        });
    },

    handleRemove : function () {
        removeTaskFromStorage(this.state);
        this.props.onDelete();
    },

    render : function () {
        var statusClass = 'task-name';
        var checked = false;
        if (this.state.status === STATUS_DONE) {
            statusClass += ' done';
            checked = true;
        }
        return (
            <div className="task">
                <div className="status">
                    <input type="checkbox"
                           checked={checked}
                           name={STATUS_DONE}
                           onChange={this.handleStatus}
                    />
                </div>
                <div className={statusClass} >{this.props.taskName}</div>
                <div className="remove-task" onClick={this.handleRemove}>×</div>
            </div>
        );
    }
});

var NotesList = React.createClass({

    handleDelete : function () {
        this.props.onTaskDelete();
    },

    render : function () {
        var _this = this;
        return (
            <div>
                {
                    this.props.tasks.map(function (task) {
                            return <Task
                              key={task.id}
                              status={task.status}
                              taskName={task.taskName}
                              id={task.id}
                              onDelete={_this.handleDelete}
                          />
                    })
                }
            </div>
        );
    }
});

var Filter = React.createClass({

    getInitialState : function () {
        return {
            filters : [
                {
                    name : 'Новые',
                    active : false,
                    value : STATUS_NEW
                },
                {
                    name : 'Завершённые',
                    active : false,
                    value : STATUS_DONE,
                },
            ]
        }
    },

    handleFilter : function (event) {
        var filterValue = event.target.getAttribute('data');
        this.props.onFilter(filterValue);
        var filters = this.state.filters.map(function (filter) {
            filter.active = filter.value === filterValue;
            return filter;
        });
        this.setState({
            filters : filters
        });
    },

    render : function () {
        var _this = this;
        return (
            <div>
                <ul className="filter">
                    <li onClick={this.handleFilter} >Все</li>
                    {
                        this.state.filters.map(function (filter) {
                            var className = filter.active ? 'active' : null;
                            return <li className={className} key={Math.random()} onClick={_this.handleFilter} data={filter.value} >{filter.name}</li>;
                        })
                    }
                </ul>
            </div>
        );
    }
});

var TasksListApp = React.createClass({

    getInitialState : function () {
        return {tasks : getTasksFromStorage()}
    },

    handleAddTask : function () {
        this.setState({tasks : getTasksFromStorage()});
    },

    handleTaskDelete : function () {
        this.setState({tasks : getTasksFromStorage()});
    },

    handleFilter : function (filterValue) {
        var tasksToShow;
        if (filterValue) {
            tasksToShow = getTasksFromStorage().filter(function (task) {
                return task.status === filterValue;
            })
        } else {
            tasksToShow = getTasksFromStorage();
        }
        this.setState({
            tasks : tasksToShow
        });
    },

    render : function () {
        return (
            <div>
                <h1>Список задач</h1>
                <Filter onFilter={this.handleFilter} />
                <NoteEditor onTaskAdd={this.handleAddTask} />
                <NotesList tasks={this.state.tasks} onTaskDelete={this.handleTaskDelete}/>
            </div>
        );
    }
});

ReactDOM.render(
    <TasksListApp />,
    document.getElementById('mount-point')
);

function getTasksFromStorage() {
    return JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY)) || [];
}

function updateTaskInStorage(taskToUpdate) {
    var tasks = JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY)) || [];
    tasks = tasks.map(function (task) {
        if (task.id === taskToUpdate.id) {
            task = taskToUpdate;
        }
        return task;
    });
    localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(tasks));
}

function removeTaskFromStorage(taskToRemove) {
    var tasks = JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY)) || [];
    var tasksToUpdate = [];
    tasks.map(function (task) {
        if (task.id !== taskToRemove.id) {
            tasksToUpdate.push(task)
        }
    });
    localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(tasksToUpdate));
}