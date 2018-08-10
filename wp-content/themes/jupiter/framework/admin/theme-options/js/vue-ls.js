/*!
 * Vue-ls.js v2.2.8
 * (c) 2017 Igor Ognichenko
 * Released under the MIT License.
 */
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (global['vue-ls'] = factory());
}(this, (function () { 'use strict';

var ls$1 = {};

var memoryStorage = {
  /**
   * Get item
   *
   * @param {string} name
   * @returns {*}
   */
  getItem: function getItem(name) {
    return name in ls$1 ? ls$1[name] : null;
  },


  /**
   * Set item
   *
   * @param {string} name
   * @param {*} value
   * @returns {boolean}
   */
  setItem: function setItem(name, value) {
    ls$1[name] = value;

    return true;
  },


  /**
   * Remove item
   *
   * @param {string} name
   * @returns {boolean}
   */
  removeItem: function removeItem(name) {
    var found = name in ls$1;

    if (found) {
      return delete ls$1[name];
    }

    return false;
  },


  /**
   * Clear storage
   *
   * @returns {boolean}
   */
  clear: function clear() {
    ls$1 = {};

    return true;
  },


  /**
   * Get item by key
   *
   * @param {number} index
   * @returns {*}
   */
  key: function key(index) {
    var keys = Object.keys(ls$1);

    return typeof keys[index] !== 'undefined' ? keys[index] : null;
  }
};

Object.defineProperty(memoryStorage, 'length', {
  /**
   * Define length property
   *
   * @return {number}
   */
  get: function get() {
    return Object.keys(ls$1).length;
  }
});

var classCallCheck = function (instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
};

var createClass = function () {
  function defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  return function (Constructor, protoProps, staticProps) {
    if (protoProps) defineProperties(Constructor.prototype, protoProps);
    if (staticProps) defineProperties(Constructor, staticProps);
    return Constructor;
  };
}();







var _extends = Object.assign || function (target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i];

    for (var key in source) {
      if (Object.prototype.hasOwnProperty.call(source, key)) {
        target[key] = source[key];
      }
    }
  }

  return target;
};

var eventListeners = {};

/**
 * Event callback
 *
 * @param {Object} e
 */
function change(e) {
  if (!e) {
    e = window.event;
  }

  if (typeof e === 'undefined' || typeof e.key === 'undefined') {
    return;
  }

  var all = eventListeners[e.key];

  if (typeof all !== 'undefined') {
    all.forEach(emit);
  }

  function emit(listener) {
    listener(e.newValue ? JSON.parse(e.newValue).value : e.newValue, e.oldValue ? JSON.parse(e.oldValue).value : e.oldValue, e.url || e.uri);
  }
}

/**
 * Storage Bridge
 */

var Storage = function () {
  /**
   * @param {Object} storage
   * @param {Object} options
   */
  function Storage(storage, options) {
    classCallCheck(this, Storage);

    this.storage = storage;
    this.options = _extends({
      namespace: '',
      events: ['storage']
    }, options || {});

    Object.defineProperty(this, 'length', {
      /**
       * Define length property
       *
       * @return {number}
       */
      get: function get$$1() {
        return this.storage.length;
      }
    });

    if (typeof window !== 'undefined') {
      for (var i in this.options.events) {
        if (window.addEventListener) {
          window.addEventListener(this.options.events[i], change, false);
        } else if (window.attachEvent) {
          window.attachEvent('on' + this.options.events[i], change);
        } else {
          window['on' + this.options.events[i]] = change;
        }
      }
    }
  }

  /**
   * Set item
   *
   * @param {string} name
   * @param {*} value
   * @param {number} expire - seconds
   */


  createClass(Storage, [{
    key: 'set',
    value: function set$$1(name, value) {
      var expire = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
      /**
       * Custom check to prevent an error if the localstorage is full.
       * @author Ayub Adiputra <ayub@artbees.net>
       */
      try {
        this.storage.setItem(this.options.namespace + name, JSON.stringify({ value: value, expire: expire !== null ? new Date().getTime() + expire : null }));
      } catch(e) {
        var storageSize = Math.round(JSON.stringify(this.storage).length);
        console.log("Something wrong happen: ");
        console.log(e);
        this.storage.removeItem(this.options.namespace + name);
      }
    }

    /**
     * Set item init. Custom function to set the localstorage in IE/Edge.
     *
     * @param {string} name
     * @param {*} save value
     * @author Ayub Adiputra <ayub@artbees.net>
     */

  }, {
    key: 'setInit',
    value: function setInit$$1(name, value) {
      var expire = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
      /* Custom check to prevent an error if the localstorage is full. */
      try {
        this.storage[ name ] = JSON.stringify( { value: value, expire: expire !== null ? new Date().getTime() + expire : null } );
      } catch(e) {
        var storageSize = Math.round(JSON.stringify(this.storage).length);
        console.log("Something wrong happen: ");
        console.log(e);
        this.storage.removeItem(this.options.namespace + name);
      }
    }

    /**
     * Set item with init for associative keys. Custom function to set the localstorage in IE/Edge.
     *
     * @param {string} name    The main key on localstorage.
     * @param {string} subname The sub key on localstorage.
     * @param {*} save value   Value will be saved on localstorage.
     * @author Ayub Adiputra <ayub@artbees.net>
     */

  }, {
    key: 'setSubInit',
    value: function setSubInit$$1( name, subname, value ) {
      /* Expire time of the 'name' on localstorage. */
      var expire = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;

      /* Custom check to prevent an error if the localstorage is full. */
      try {
        /* Get 'name' item on storage. */
        var item = this.storage.getItem( this.options.namespace + name );

        /* If the item is not null or exist, extract data value. Otherwise, create data as new object. */
        if ( item !== null ) {
          var raw = JSON.parse( item );
          var data = raw.value;
        } else {
          var data = {};
        }

        /* Merge the property if data has 'subname'. Add new property if data doesn't has 'subname'. */
        if ( data.hasOwnProperty( subname ) ) {
          var dataAdd = {};
          dataAdd[ subname ] = value;
          data = Object.assign( data, dataAdd );
        } else {
          data[ subname ] = value;
        }

        /* Save the data. */
        this.storage[ name ] = JSON.stringify( { value: data, expire: expire !== null ? new Date().getTime() + expire : null } );

      } catch( e ) {
        var storageSize = Math.round( JSON.stringify( this.storage ).length );
        console.log( "Something wrong happen: " );
        console.log( e );
        this.storage.removeItem( this.options.namespace + name );
      }
    }

    /**
     * Get item based on sub key name.
     *
     * @param {string} name    The main key on localstorage.
     * @param {string} subname The sub key on localstorage.
     * @param {*} def - default value
     * @returns {*}
     */

  }, {
    key: 'getSub',
    value: function getSub$$1( name, subname ) {
      /* Default value if data is null or key not exist. */
      var def = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;

      /* Get data based on 'name'. */
      var item = this.storage.getItem( this.options.namespace + name );
        // console.log( subname )

      /* If 'name' data is not null. */
      if ( item !== null ) {
        /* Extract the data. */
        var raw = JSON.parse( item );
        var data = raw.value;

        /* Check if item has 'subname'. */
        if ( ! data.hasOwnProperty( subname ) ) {
          return def;
        }

        return data[ subname ];
      }

      return def;
    }

    /**
     * Get item
     *
     * @param {string} name
     * @param {*} def - default value
     * @returns {*}
     */

  }, {
    key: 'get',
    value: function get$$1(name) {
      var def = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;

      var item = this.storage.getItem(this.options.namespace + name);

      if (item !== null) {
        var data = JSON.parse(item);

        if (data.expire === null) {
          return data.value;
        }

        if (data.expire >= new Date().getTime()) {
          return data.value;
        }

        this.remove(name);
      }

      return def;
    }

    /**
     * Get item by key
     *
     * @param {number} index
     * @return {*}
     */

  }, {
    key: 'key',
    value: function key(index) {
      return this.storage.key(index);
    }

    /**
     * Remove item
     *
     * @param {string} name
     * @return {boolean}
     */

  }, {
    key: 'remove',
    value: function remove(name) {
      return this.storage.removeItem(this.options.namespace + name);
    }

    /**
     * Clear storage
     */

  }, {
    key: 'clear',
    value: function clear() {
      if (this.length === 0) {
        return;
      }

      var removedKeys = [];

      for (var i = 0; i < this.length; i++) {
        var key = this.storage.key(i);
        var regexp = new RegExp('^' + this.options.namespace + '.+', 'i');

        if (regexp.test(key) === false) {
          continue;
        }

        removedKeys.push(key);
      }

      for (var _key in removedKeys) {
        this.storage.removeItem(removedKeys[_key]);
      }
    }

    /**
     * Add storage change event
     *
     * @param {string} name
     * @param {Function} callback
     */

  }, {
    key: 'on',
    value: function on(name, callback) {
      if (eventListeners[this.options.namespace + name]) {
        eventListeners[this.options.namespace + name].push(callback);
      } else {
        eventListeners[this.options.namespace + name] = [callback];
      }
    }

    /**
     * Remove storage change event
     *
     * @param {string} name
     * @param {Function} callback
     */

  }, {
    key: 'off',
    value: function off(name, callback) {
      var ns = eventListeners[this.options.namespace + name];

      if (ns.length > 1) {
        ns.splice(ns.indexOf(callback), 1);
      } else {
        eventListeners[this.options.namespace + name] = [];
      }
    }
  }]);
  return Storage;
}();

var store = typeof window !== 'undefined' && 'localStorage' in window ? window.localStorage : memoryStorage;
var storageObject = new Storage(store);

var VueLocalStorage = {
  /**
   * Install plugin
   *
   * @param {Object} Vue
   * @param {Object} options
   * @returns {Storage}
   */
  install: function install(Vue, options) {
    storageObject.options = _extends(storageObject.options, {
      namespace: ''
    }, options || {});

    Vue.ls = storageObject;
    Object.defineProperty(Vue.prototype, '$ls', {
      /**
       * Define $ls property
       *
       * @return {Storage}
       */
      get: function get$$1() {
        return storageObject;
      }
    });
  }
};

if (typeof window !== 'undefined') {
  window.VueLocalStorage = VueLocalStorage;
}

return VueLocalStorage;

})));
