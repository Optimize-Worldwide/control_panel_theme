!function(t){if("object"==typeof exports)module.exports=t();else if("function"==typeof define&&define.amd)define(t);else{var e;"undefined"!=typeof window?e=window:"undefined"!=typeof global?e=global:"undefined"!=typeof self&&(e=self),e.fitterHappierText=t()}}(function(){return function t(e,r,i){function n(f,u){if(!r[f]){if(!e[f]){var s="function"==typeof require&&require;if(!u&&s)return s(f,!0);if(o)return o(f,!0);throw new Error("Cannot find module '"+f+"'")}var l=r[f]={exports:{}};e[f][0].call(l.exports,function(t){var r=e[f][1][t];return n(r?r:t)},l,l.exports,t,e,r,i)}return r[f].exports}for(var o="function"==typeof require&&require,f=0;f<i.length;f++)n(i[f]);return n}({1:[function(t,e){e.exports=function(t,e){for(var e=e||{},r=e.baseline||16,i=e.paddingY||0,n=e.doc||document,o=0;o<t.length;o++){var f,u,s=t[o].textContent,l=n.createElementNS("http://www.w3.org/2000/svg","svg"),a=n.createElementNS("http://www.w3.org/2000/svg","text");a.textContent=s,a.setAttribute("x","0"),a.setAttribute("y",r),a.setAttribute("font-family","inherit"),a.setAttribute("font-size","1rem"),a.setAttribute("font-weight","inherit"),a.setAttribute("style","text-anchor:start");for(var d=0;d<t[o].attributes.length;d++)l.setAttribute(t[o].attributes[d].name,t[o].attributes[d].value);l.setAttribute("width","100%"),l.setAttribute("style","max-height:100%"),l.setAttribute("fill","currentcolor"),l.setAttribute("overflow","visible"),l.appendChild(a),t[o].parentNode.replaceChild(l,t[o]),f=a.offsetWidth||a.getComputedTextLength(),u=a.offsetHeight||24,l.setAttribute("viewBox","0 0 "+f+" "+(u+i))}}},{}]},{},[1])(1)});