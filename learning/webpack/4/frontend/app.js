'use strict';

let moment = require('moment');

let today = moment(new Date()).locale('jp');

alert(today.format('DD MMM YYYY'));