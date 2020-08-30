var unique_tag;
var freq_tag;
var max;
var max_unique_tag;
var max_freq_tag;
var content;

//helper function for font size in function element
function calculate(calc) {
	return Math.round(((freq_tag[calc]/max_freq_tag) * 20) + 15);
}

function alerts(i) {
	alert(unique_tag[i] + ": " + freq_tag[i] + " occurrences");
}

//helper function for erasing, content, and alerts
function element() {
	newdiv = document.getElementById("newDiv");
	tcl = document.getElementById("tagcloud");
	if (tcl != null) {
		newdiv.removeChild(tcl);
	}

	ele = document.createElement("div");
	ele.id = "tagcloud";

	ele.style.border = ".1em solid silver";
	ele.style.backgroundColor = "blue";
	ele.style.color = "silver"; //foreground
	ele.style.font = "x-large serif";

	newdiv.appendChild(ele);
	eleNode = document.getElementById("tagcloud");

	for(i = 0; i < unique_tag.length; i++) {
		cont = document.createElement("span");
		cont.id = "cloud" + i;

		cont.style.fontSize = calculate(i) + "pt";
		cont.style.display = "inline-block";
		cont.style.padding = "6px";

		eleNode.appendChild(cont);

		text = document.getElementById("cloud" + i);
		text.innerHTML = unique_tag[i];

		text.setAttribute("onclick", "alerts('" + i + "')");
	}
}

//helper function for maximum frequency for set of tags
function maximum_freq() {
	max = 0;

	for (i = 0; i< freq_tag.length; i++) {
		if (freq_tag[i] > freq_tag[max]) {
			max = i;
		}
	}
	max_unique_tag = unique_tag[max];
	max_freq_tag = freq_tag[max];
}

function makeCloud() {
	content = document.getElementById("tags").value;
	content_sep = content.split(" ");
	pop = "";

	content_sep.sort();

	unique_tag = new Array(); //unique tag
	freq_tag = new Array(); //frequency tag

	for(j = 0; j < content_sep.length; j++) {
		if (content_sep[j] != pop) {
			pop = content_sep[j];
			unique_tag.push(pop);
			freq_tag.push(1);
		}
		else {
			freq_tag[freq_tag.length - 1]++;
		}
	}
	maximum_freq();
	element();
}

function saveCloud() {
	content = document.getElementById("tags").value;
	expires = "";
	document.cookie = "my_cookie:" + content + "/ expires:" + expires;
}

function loadCloud() {
	document.getElementById("tags").value = document.cookie.split(":")[1].split("/")[0];
}

function clearArea() {
	document.getElementsByTagName("textarea")[0].value = "";
}

