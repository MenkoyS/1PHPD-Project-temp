function addTag(event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    var auteursInput = document.getElementById("auteursInput");
    var tagsContainer = document.getElementById("tagsContainer");
    var auteursHidden = document.getElementById("auteursHidden");

    var auteur = auteursInput.value.trim();
    if (auteur !== "") {
      var tag = document.createElement("div");
      tag.classList.add("tag");
      tag.innerHTML =
        "<span>" +
        auteur +
        "</span><button onclick='removeTag(this)'>X</button>";
      tagsContainer.appendChild(tag);

      if (auteursHidden.value !== "") {
        auteursHidden.value += ",";
      }
      auteursHidden.value += auteur;

      auteursInput.value = "";
    }
  }
}

function removeTag(tag) {
  var tagsContainer = document.getElementById("tagsContainer");
  var auteursHidden = document.getElementById("auteursHidden");

  tagsContainer.removeChild(tag.parentNode);

  var auteur = tag.previousSibling.textContent.trim();
  var auteurs = auteursHidden.value.split(",");
  var index = auteurs.indexOf(auteur);
  if (index !== -1) {
    auteurs.splice(index, 1);
    auteursHidden.value = auteurs.join(",");
  }
}

function validateForm() {
  var genre = document.getElementById("genre").value;
  var image = document.getElementById("image").value;
  var titre = document.getElementById("titre").value;
  var realisateur = document.getElementById("realisateur").value;
  var auteurs = document.getElementById("auteursHidden").value;

  if (
    genre === "" ||
    image === "" ||
    titre === "" ||
    realisateur === "" ||
    auteurs === ""
  ) {
    alert("Veuillez remplir tous les champs obligatoires.");
    return false;
  }

  return true;
}
