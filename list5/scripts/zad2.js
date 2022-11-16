const myImages = document.images;
let text = "List of your images: ";
for (const element of myImages) {
  text += element.alt + " ";
  document.getElementById("img_desc").innerHTML = text;
}


const myLinks = document.links;
let text2 = "List of destination of your links: ";
for (const element of myLinks) {
  text2 += element.href + " ";
  document.getElementById("link_desc").innerHTML = text2;
}

const myFormId = document.forms.item(0).id;
document.getElementById("form_desc").innerHTML = "Id of form: " + myFormId;

const secondAnchor = document.anchors.namedItem("second_anchor");
document.getElementById("anchor_desc").innerHTML = "Name of second anchor: " + secondAnchor.name;