//ECMA 5
'use strict';

/*
* Encapsulate Object in Anonymous Function
* The "big" question at time
*/
/*(function() {}) (window);*/

/********************************************
*
* Header object
* Author: Salvatore Gonda <salvatore.gonda@web.de>
* Note: not defined, but due to error when preloading,
*		may there is a proxy needed
*
********************************************/
function Header(){};
window.Header = Header || {};

/********************************************
*
* Brand object
* Author: Salvatore Gonda <salvatore.gonda@web.de>
*
********************************************/
function Brand(width,height,bid,sid,use)
{
	var width=width;// integer
	var height=height;//integer
	var brandID=bid;// string, ex: page-brand
	var splashID=sid;// string, ex: page-splash-brand
	var useSplash=use;// boolean
	var clrCircle='#fff';//fill color circle
	var clrPath='#000';//fill color path
	var strlcPath='round';
	var strwPath='0.6';
	var clrStrokeGroup='#000';//stroke color group
	this.init(width,height,brandID,useSplash,splashID,clrCircle,clrPath,strlcPath,strwPath,clrStrokeGroup);
	return this;
};

/*
* Static methods for svg output:
* Note: not all arguments are defined
*		maybe define a new object for svg elements
* 	- circle
*	- path
*	- group
*	- svg
*/
Brand.circle = function(fill) 
{
	var circle = document.createElement('circle');
	circle.setAttribute('cx','29.442');
	circle.setAttribute('cy','18.133');
	circle.setAttribute('r','2.423');
	circle.setAttribute('fill',fill);
	return circle;
};

Brand.path = function(fill,strlc,strw) 
{
	var path = document.createElement('path');
	path.setAttribute('fill',fill);
	path.setAttribute('stroke-linecap',strlc);
	path.setAttribute('stroke-width',strw);
	path.setAttribute('d','M0 23.454v-10.55h5.268c2.904 0 5.268 2.378 5.268 5.283 0 2.904-2.363 5.268-5.268 5.268H0zM29.443 0v10.666c4.123 0 7.467 3.343 7.467 7.468s-3.344 7.468-7.467 7.468c-4.107 0-7.438-3.315-7.467-7.415l-.016-5.237-5.334 4.038-5.332-4.038.014 5.304h.004c.064 9.959 8.156 18.014 18.131 18.014 10.014 0 18.133-8.119 18.133-18.134S39.457 0 29.443 0zm18.999 12.873h10.537v5.508c0 2.905-2.363 5.268-5.268 5.268-2.906 0-5.27-2.363-5.27-5.268v-5.508zm16.674 3.913v-3.883h5.238v10.535H59.819V12.647l5.297 4.139zm13.41 6.668h-5.268v-5.268h-2.182v-5.283h9.496v5.283h-2.047v5.268z');
	return path;
};

Brand.group = function(stroke) 
{
	var group = document.createElement('g');
	group.setAttribute('id','svg-group-brand');
	group.setAttribute('stroke',stroke);
	return group;
};

Brand.svg = function(width,height) 
{
	var svg = document.createElementNS('http://www.w3.org/2000/svg','svg');
	svg.setAttribute('id', 'svg-brand');
	svg.setAttribute('viewbox', '0 0 '+width+' '+height);
	svg.setAttribute('width',width);
	svg.setAttribute('height',height);
	return svg;
};

/*
* Brand object instances
* 	- init
*	- id
*	- onload
*/

//Lazy loading
Brand.prototype.init = function(width,height,brandid,useSplash,id,clrCircle,clrPath,strlcPath,strwPath,clrStrokeGroup) 
{
	this.onload(width,height,brandid,useSplash,id,clrCircle,clrPath,strlcPath,strwPath,clrStrokeGroup);
};

Brand.prototype.id = function(brandid,useSplash,splashID)
{
	if(useSplash === true)
		var id=splashID;
	else var id=brandid;
	return id;
};

/*Higher-order method: create svg logo with onload*/
Brand.prototype.onload = function(width,height,brandid,useSplash,splashID,clrCircle,clrPath,strlcPath,strwPath,clrStrokeGroup)
{
	//define
	var id = this.id(brandid,useSplash,splashID);
	var group = Brand.group(clrStrokeGroup);
	var path = Brand.path(clrPath,strlcPath,strwPath);
	var circle = Brand.circle(clrCircle);
	var svg = Brand.svg(width,height);

	//append
	group.appendChild(path);
	group.appendChild(circle);
	svg.appendChild(group);
	
	//serialize
	var XMLS = new XMLSerializer(); // initialize object
	var img = XMLS.serializeToString(svg); // convert DOM node into string
	this.id = document.getElementById(id);
	
	//prepend insertAdjacentHTML of null error
	//Note: need to fix
	//		error seen on safari and chrome, when reloading with open console
	//		html header is not loading from php file; may cache problems
	if(this.id === null){
		return;
	}
	else
	{
		//insert svg element at afterbegin of id with AdjacentHTML
		document.getElementById(id).insertAdjacentHTML('afterbegin',img);
		return;
	}
};

window.Brand = Brand || {};

/*******************************************
*
* Tabs object
* Author: Salvatore Gonda <salvatore.gonda@web.de>
* 
********************************************/
function Tabs(id,index,cls)
{
	//define
	var id=id;
	var index=index;
	var clsUl=cls[0];//tabs
	var clsLi=cls[1];//tab-link
	var clsAnim=cls[2];//animated bounceInDown
	this.init(id,index,clsUl,clsLi,clsAnim);
	return this;
};

/*
* Static methods for html output:
* Note: not all arguments are defined
*		maybe define a new object for html elements
* 	- ul (unordered list)
*	- li (list element)
*/
Tabs.unorderedlist = function(clsUl)
{
	var ul = document.createElement('ul');
	ul.setAttribute('class',clsUl);
	return ul;	
};

Tabs.list = function(index,clsLi,clsAnim)
{
	var index=index;
	var len=index.length;
	var fragment=document.createDocumentFragment();
	for(var i=0;i<len;i++){
		var current=(i===0)?'current':'';
		var li = document.createElement('li');//create element
		li.setAttribute('class',clsLi+' '+current+' '+clsAnim);//set class attribute
		li.setAttribute('data-tab','tab-'+(i+1));//
		var span = document.createElement('span');
		span.innerHTML=index[i];
		li.appendChild(span);
		fragment.appendChild(li);
	}
	return fragment;
};

/*
* Tabs object instances
* 	- init
*	- onload
*/
//Lazy loading
Tabs.prototype.init = function(id,index,clsUl,clsLi,clsAnim){
	this.onload(id,index,clsUl,clsLi,clsAnim);
};

Tabs.prototype.onload = function(id,index,clsUl,clsLi,clsAnim){
	var ul = Tabs.unorderedlist(clsUl),
		li = Tabs.list(index,clsLi,clsAnim);
	//Note: need to fix
	//when brand is not loading, ul can't appendChild (is of null)
	ul.appendChild(li);
	document.getElementById(id).appendChild(ul);
	return;
};

window.Tabs = Tabs || {};

/*
* Splash object
* Author: Salvatore Gonda <salvatore.gonda@web.de>
* Note: define all the statements, put in document.ready, here
*/
function Splash(){};
window.Splash = Splash || {};