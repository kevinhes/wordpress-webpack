/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/single/electronicCatalog.js":
/*!***********************************************!*\
  !*** ./assets/js/single/electronicCatalog.js ***!
  \***********************************************/
/***/ (() => {

eval("var editorH3 = document.querySelectorAll('.editor-content h3');\n// const editorH4 = document.querySelectorAll('.editor-content h4');\nvar postList = document.querySelector('.post-list');\nvar anchorTitle = [];\nvar anchorIndex = 0;\neditorH3.forEach(function (h3, index) {\n  h3.setAttribute('id', \"anchor-\".concat(anchorIndex));\n  anchorTitle.push({\n    title: h3.textContent,\n    index: anchorIndex,\n    sublist: []\n  });\n  anchorIndex++;\n  var nextSibling = h3.nextElementSibling;\n  var editorH4 = [];\n  // 檢查每一個後面的兄弟元素，直到找到另一個 h3\n  while (nextSibling && nextSibling.tagName !== 'H3') {\n    if (nextSibling.tagName === 'H4') {\n      nextSibling.setAttribute('id', \"anchor-\".concat(anchorIndex));\n      editorH4.push(nextSibling);\n      anchorTitle[index].sublist.push({\n        title: nextSibling.textContent,\n        index: anchorIndex\n      });\n      anchorIndex++;\n    }\n    nextSibling = nextSibling.nextElementSibling;\n  }\n});\nanchorTitle.forEach(function (title) {\n  var listItem = document.createElement('li');\n  listItem.classList.add('mb-2');\n  // 主要的 h3 鏈接\n  var mainLink = document.createElement('a');\n  mainLink.href = \"#anchor-\".concat(title.index);\n  mainLink.className = 'text-dark';\n  mainLink.textContent = title.title;\n  listItem.appendChild(mainLink);\n  if (title.sublist.length > 0) {\n    var subMenu = document.createElement('ol');\n    subMenu.classList.add('sub-menu');\n    title.sublist.forEach(function (subTitle) {\n      var subListItem = document.createElement('li');\n      subListItem.className = 'ps-3';\n      var subLink = document.createElement('a');\n      subLink.href = \"#anchor-\".concat(subTitle.index);\n      subLink.className = 'text-dark';\n      subLink.textContent = subTitle.title;\n      subListItem.appendChild(subLink);\n      subMenu.appendChild(subListItem);\n    });\n    listItem.appendChild(subMenu);\n  }\n  postList.appendChild(listItem);\n});\nvar shareBtn = document.querySelector('[type=\"button\"].item-link');\nfunction copyCurrentUrl() {\n  navigator.clipboard.writeText(window.location.href).then(function () {\n    alert('URL copied to clipboard!');\n  })[\"catch\"](function (err) {\n    console.error('Could not copy URL: ', err);\n  });\n}\nshareBtn.addEventListener('click', function () {\n  copyCurrentUrl();\n});\n\n//# sourceURL=webpack://underscores/./assets/js/single/electronicCatalog.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./assets/js/single/electronicCatalog.js"]();
/******/ 	
/******/ })()
;