/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/custom.js":
/*!***************************************!*\
  !*** ./resources/assets/js/custom.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $('#profile').click(function () {
    if ($(this).attr('class') == 'clicked') {
      $(this).removeClass('clicked');
      $('.dropdown-lists').slideUp('fast');
    } else {
      $(this).addClass('clicked');
      $('.dropdown-lists').slideDown('fast');
    }
  });
});
$(function () {
  $('#modal-open').click(function () {
    $('#modal').show();
  });
  $('#modal-close').click(function () {
    $('#modal').hide();
  });
  $('#modal-bg-close').click(function () {
    $('#modal').hide();
  });
}); // user検索

$(function () {
  $('#ajaxSearchUser').click(function () {
    $.ajax({
      url: './users/search',
      type: 'GET',
      dataType: 'json',
      data: {
        'prefecture': $('#prefecture').val(),
        'sex': $('input[name="sex"]:checked').val(),
        'matching_age': {
          'matching_age_from': $('#matchingAgeFrom').val(),
          'matching_age_to': $('#matchingAgeTo').val()
        }
      }
    }).done(function (data) {
      $('#modal').hide(); // 指定した要素の子要素を削除

      $('#usersBox').empty(); // 検索結果を画面に反映

      for (var i = 0; i < data.length; i++) {
        var user = data[i];
        $('#usersBox').append("<li class='user-list'><div class='d-flex'><div class='user-icon-box'><i class='fas fa-user user-icon'></i></div><div><div class='d-flex'><p class='user-name'>" + user.user_name + "</p><p class='user-age ml-2'>" + user.age + "</p><p class='user-prefecture ml-2'>" + user.prefecture_name + "</p></div><div><p class='user-profile'>" + user.profile + "</p></div></div></div><div class='d-flex justify-content-between'><div class='user-matching'><input type='hidden' name='match_id' value='" + user.id + "' id='matchUser" + user.id + "'><button class='btn btn-vioret w-auto btn-match'>マッチング希望</button></div><div class='user-report'><button class='btn btn-danger'>通報</button></div></div></li>");
      }
    }).fail(function (data) {
      console.log(data);
    });
  });
}); // マッチング希望送信

$(function () {
  console.log('dddd');
  $(document).on('click', '.btn-match', function () {
    console.log('aaaaa');
    var matchReciverId = $(this).prev('input[name="match_id"]');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: './user/match',
      type: 'POST',
      dataType: 'json',
      data: {
        'match_reciver_id': matchReciverId.val()
      }
    }).done(function (data) {
      console.log(data.match_reciver_id);
      console.log(matchReciverId.val());

      if (data.match_reciver_id == matchReciverId.val()) {
        var matchUser = $('#' + 'matchUser' + matchReciverId.val());
        matchUser.next('button').remove();
        matchUser.after('<p>承認結果待ち</p>');
      }
    }).fail(function (data) {// console.log(data)
    });
  });
});

/***/ }),

/***/ 1:
/*!*********************************************!*\
  !*** multi ./resources/assets/js/custom.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/MARI/Aplication/matching_app/matching/resources/assets/js/custom.js */"./resources/assets/js/custom.js");


/***/ })

/******/ });