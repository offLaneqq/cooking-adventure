/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************!*\
  !*** ./src/js/author.js ***!
  \**************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
(function ($) {
  var Author = /*#__PURE__*/function () {
    function Author() {
      _classCallCheck(this, Author);
      this.authorProfileImgContainer = $("#author-profile-img span");
      this.authorFirstNameText = $("#author-firstname").text();
      this.authorLastNameText = $("#author-lastname").text();
      this.init();
    }
    _createClass(Author, [{
      key: "init",
      value: function init() {
        if (!this.authorProfileImgContainer.length) {
          return null;
        }
        var initials = this.authorFirstNameText.charAt(0) + this.authorLastNameText.charAt(0);
        initials = initials ? initials : "A";

        // Set the text.
        this.authorProfileImgContainer.text(initials);
      }
    }]);
    return Author;
  }();
  new Author();
})(jQuery);
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoianMvYXV0aG9yLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7O0FBQUEsQ0FBQyxVQUFVQSxDQUFDLEVBQUU7RUFBQSxJQUNOQyxNQUFNO0lBQ1YsU0FBQUEsT0FBQSxFQUFjO01BQUFDLGVBQUEsT0FBQUQsTUFBQTtNQUNaLElBQUksQ0FBQ0UseUJBQXlCLEdBQUdILENBQUMsQ0FBQywwQkFBMEIsQ0FBQztNQUM5RCxJQUFJLENBQUNJLG1CQUFtQixHQUFHSixDQUFDLENBQUMsbUJBQW1CLENBQUMsQ0FBQ0ssSUFBSSxDQUFDLENBQUM7TUFDeEQsSUFBSSxDQUFDQyxrQkFBa0IsR0FBR04sQ0FBQyxDQUFDLGtCQUFrQixDQUFDLENBQUNLLElBQUksQ0FBQyxDQUFDO01BRXRELElBQUksQ0FBQ0UsSUFBSSxDQUFDLENBQUM7SUFDYjtJQUFDQyxZQUFBLENBQUFQLE1BQUE7TUFBQVEsR0FBQTtNQUFBQyxLQUFBLEVBRUQsU0FBQUgsS0FBQSxFQUFPO1FBQ0wsSUFBSSxDQUFDLElBQUksQ0FBQ0oseUJBQXlCLENBQUNRLE1BQU0sRUFBRTtVQUMxQyxPQUFPLElBQUk7UUFDYjtRQUVBLElBQUlDLFFBQVEsR0FDVixJQUFJLENBQUNSLG1CQUFtQixDQUFDUyxNQUFNLENBQUMsQ0FBQyxDQUFDLEdBQUcsSUFBSSxDQUFDUCxrQkFBa0IsQ0FBQ08sTUFBTSxDQUFDLENBQUMsQ0FBQztRQUN4RUQsUUFBUSxHQUFHQSxRQUFRLEdBQUdBLFFBQVEsR0FBRyxHQUFHOztRQUVwQztRQUNBLElBQUksQ0FBQ1QseUJBQXlCLENBQUNFLElBQUksQ0FBQ08sUUFBUSxDQUFDO01BQy9DO0lBQUM7SUFBQSxPQUFBWCxNQUFBO0VBQUE7RUFHSCxJQUFJQSxNQUFNLENBQUMsQ0FBQztBQUNkLENBQUMsRUFBRWEsTUFBTSxDQUFDLEMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9jb29raW5nX2FkdmVudHVyZS8uL3NyYy9qcy9hdXRob3IuanMiXSwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uICgkKSB7XHJcbiAgY2xhc3MgQXV0aG9yIHtcclxuICAgIGNvbnN0cnVjdG9yKCkge1xyXG4gICAgICB0aGlzLmF1dGhvclByb2ZpbGVJbWdDb250YWluZXIgPSAkKFwiI2F1dGhvci1wcm9maWxlLWltZyBzcGFuXCIpO1xyXG4gICAgICB0aGlzLmF1dGhvckZpcnN0TmFtZVRleHQgPSAkKFwiI2F1dGhvci1maXJzdG5hbWVcIikudGV4dCgpO1xyXG4gICAgICB0aGlzLmF1dGhvckxhc3ROYW1lVGV4dCA9ICQoXCIjYXV0aG9yLWxhc3RuYW1lXCIpLnRleHQoKTtcclxuXHJcbiAgICAgIHRoaXMuaW5pdCgpO1xyXG4gICAgfVxyXG5cclxuICAgIGluaXQoKSB7XHJcbiAgICAgIGlmICghdGhpcy5hdXRob3JQcm9maWxlSW1nQ29udGFpbmVyLmxlbmd0aCkge1xyXG4gICAgICAgIHJldHVybiBudWxsO1xyXG4gICAgICB9XHJcblxyXG4gICAgICBsZXQgaW5pdGlhbHMgPVxyXG4gICAgICAgIHRoaXMuYXV0aG9yRmlyc3ROYW1lVGV4dC5jaGFyQXQoMCkgKyB0aGlzLmF1dGhvckxhc3ROYW1lVGV4dC5jaGFyQXQoMCk7XHJcbiAgICAgIGluaXRpYWxzID0gaW5pdGlhbHMgPyBpbml0aWFscyA6IFwiQVwiO1xyXG5cclxuICAgICAgLy8gU2V0IHRoZSB0ZXh0LlxyXG4gICAgICB0aGlzLmF1dGhvclByb2ZpbGVJbWdDb250YWluZXIudGV4dChpbml0aWFscyk7XHJcbiAgICB9XHJcbiAgfVxyXG5cclxuICBuZXcgQXV0aG9yKCk7XHJcbn0pKGpRdWVyeSk7XHJcbiJdLCJuYW1lcyI6WyIkIiwiQXV0aG9yIiwiX2NsYXNzQ2FsbENoZWNrIiwiYXV0aG9yUHJvZmlsZUltZ0NvbnRhaW5lciIsImF1dGhvckZpcnN0TmFtZVRleHQiLCJ0ZXh0IiwiYXV0aG9yTGFzdE5hbWVUZXh0IiwiaW5pdCIsIl9jcmVhdGVDbGFzcyIsImtleSIsInZhbHVlIiwibGVuZ3RoIiwiaW5pdGlhbHMiLCJjaGFyQXQiLCJqUXVlcnkiXSwic291cmNlUm9vdCI6IiJ9