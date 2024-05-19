var addAnnouncementModal = document.getElementById("add-announcement-modal");
var updateAnnouncementModal = document.getElementById(
  "update-announcement-modal"
);

var span = document.getElementsByClassName("close")[0];

var allAnnouncementsBtn = document.getElementById("all-announcements-button");
allAnnouncementsBtn.click();

function openAddAnnouncementModal() {
  addAnnouncementModal.style.display = "block";
}

function openUpdateAnnouncementModal(announcementId) {
  updateAnnouncementModal.style.display = "block";

  const xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    `./php/process-get-announcement.php?announcementId=${announcementId}`
  );

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      var response = JSON.parse(xhr.responseText);

      updateAnnouncementModal.querySelector("#announcementId").value = response["id"];
      updateAnnouncementModal.querySelector("#title").value = response["title"];
      updateAnnouncementModal.querySelector("#content").value =
        response["content"];
      updateAnnouncementModal.querySelector("#game").value =
        response["game_id"];
    } else {
      console.error("Could not send the request: ", xhr.statusText);
    }
  };

  xhr.send();
}

function closeAddAnnouncementModal() {
  addAnnouncementModal.style.display = "none";
}

function closeUpdateAnnouncementModal() {
  updateAnnouncementModal.style.display = "none";
}

window.onclick = function (event) {
  if (event.target == addAnnouncementModal) {
    addAnnouncementModal.style.display = "none";
  }

  if (event.target == updateAnnouncementModal) {
    updateAnnouncementModal.style.display = "none";
  }
};

function openDeleteAnnouncementModal(announcementId) {
  var confirmDelete = confirm(
    "Are you sure you want to delete this announcement?"
  );
  if (confirmDelete) {
    window.location.href =
      "php/process-delete-announcement.php?id=" + announcementId;
  }
}

function loadAnnouncements(gameId) {
  const xhr = new XMLHttpRequest();

  xhr.open("GET", `./php/process-get-announcements-by-game.php?gameId=${gameId}`);

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      var response = JSON.parse(xhr.responseText);

      var announcementsList = document.getElementById("announcements-list");
      announcementsList.innerHTML = "";

      response.announcements.forEach(function (announcement) {
        var announcementCard = document.createElement("div");
        announcementCard.classList.add("announcement-card");

        var imageBox = document.createElement("div");
        imageBox.classList.add("image-box");

        var image = document.createElement("img");
        image.src = announcement.cover_image;
        image.alt = announcement.title;

        var title = document.createElement("h3");
        title.textContent = announcement.title;

        var hr = document.createElement("hr");

        var content = document.createElement("p");
        content.textContent = announcement.content;

        imageBox.appendChild(image);
        announcementCard.appendChild(imageBox);
        announcementCard.appendChild(title);
        announcementCard.appendChild(hr);
        announcementCard.appendChild(content);

        if (response.isAdmin) {
          var deleteButton = document.createElement("div");
          deleteButton.classList.add("delete-announcement-button");
          var deleteBtn = document.createElement("button");
          deleteBtn.textContent = "Delete";
          deleteBtn.onclick = function () {
            openDeleteAnnouncementModal(announcement.id);
          };
          deleteButton.appendChild(deleteBtn);

          var updateButton = document.createElement("div");
          updateButton.classList.add("update-announcement-button");
          var updateBtn = document.createElement("button");
          updateBtn.textContent = "Update";
          updateBtn.onclick = function () {
            openUpdateAnnouncementModal(announcement.id);
          };
          updateButton.appendChild(updateBtn);

          announcementCard.appendChild(deleteButton);
          announcementCard.appendChild(updateButton);
        }

        announcementsList.appendChild(announcementCard);
      });
    } else {
      console.error("Could not send the request: ", xhr.statusText);
    }
  };

  xhr.send();
}


function loadAllAnnouncements() {
  const xhr = new XMLHttpRequest();

  xhr.open("GET", `./php/process-get-all-announcements.php`);

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      var response = JSON.parse(xhr.responseText);

      var announcementsList = document.getElementById("announcements-list");
      announcementsList.innerHTML = "";

      response.announcements.forEach(function (announcement) {
        var announcementCard = document.createElement("div");
        announcementCard.classList.add("announcement-card");

        var imageBox = document.createElement("div");
        imageBox.classList.add("image-box");

        var image = document.createElement("img");
        image.src = announcement.cover_image;
        image.alt = announcement.title;

        var title = document.createElement("h3");
        title.textContent = announcement.title;

        var hr = document.createElement("hr");

        var content = document.createElement("p");
        content.textContent = announcement.content;

        imageBox.appendChild(image);
        announcementCard.appendChild(imageBox);
        announcementCard.appendChild(title);
        announcementCard.appendChild(hr);
        announcementCard.appendChild(content);

        if (response.isAdmin) {
          var deleteButton = document.createElement("div");
          deleteButton.classList.add("delete-announcement-button");
          var deleteBtn = document.createElement("button");
          deleteBtn.textContent = "Delete";
          deleteBtn.onclick = function () {
            openDeleteAnnouncementModal(announcement.id);
          };
          deleteButton.appendChild(deleteBtn);

          var updateButton = document.createElement("div");
          updateButton.classList.add("update-announcement-button");
          var updateBtn = document.createElement("button");
          updateBtn.textContent = "Update";
          updateBtn.onclick = function () {
            openUpdateAnnouncementModal(announcement.id);
          };
          updateButton.appendChild(updateBtn);

          announcementCard.appendChild(deleteButton);
          announcementCard.appendChild(updateButton);
        }

        announcementsList.appendChild(announcementCard);
      });
    } else {
      console.error("Could not send the request: ", xhr.statusText);
    }
  };

  xhr.send();
}

