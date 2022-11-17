const paragraph = document.createElement('p');
paragraph.innerHTML ='createElement + appendChild';
document.getElementById('div1').appendChild(paragraph);

const textNode = document.createTextNode('Text Node - Insert before');
const node_text = document.createElement('p');
node_text.appendChild(textNode);
document.getElementById('div1').insertBefore(node_text, document.getElementById('h1-1'));

const toReplace = document.getElementById('h1-2');
const replacedBy = document.createElement('h2');
replacedBy.innerHTML = "Replace child"
document.getElementById('div1').replaceChild(replacedBy, toReplace);

const toRemove = document.getElementById('h1-3');
document.getElementById('div1').removeChild(toRemove);

const list_one = document.getElementById('list-one');
const list = list_one.parentNode;
const new_li_node = document.createElement('li');
new_li_node.innerHTML = "element " + (list.childElementCount + 1);
list.appendChild(new_li_node);


