import 'lodash'
import 'bootstrap'

import * as jQuery from 'jquery'
window.$ = window.jQuery = jQuery
window.Popper = require('popper.js').default

import * as axios from 'axios'
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
