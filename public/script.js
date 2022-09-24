const hiddenSubject = document.getElementById("hiddenSubject");
const hiddenGrade = document.getElementById("hiddenGrade");
const hiddenSubjectBut = document.getElementById("hiddenSubjectBut");
const hiddenGradetBut = document.getElementById("hiddenGradetBut");
const avatarImage = document.querySelectorAll(".modal-content img");
const hiddenAvatar = document.getElementById("hiddenAvatar");
const hiddenAvatarBut = document.getElementById("hiddenAvatarBut");
const fix = document.querySelector(".fix");
const activ = document.querySelectorAll(".activ");
const courseHead = document.querySelectorAll('.courseHead')
// start become a teacher
var multipleGrade = [];

function createValueInputSubject(valueInput) {
  hiddenSubject.value = valueInput;
  hiddenSubjectBut.innerHTML = valueInput;
}

function createValueInputGrade(valueInput) {
  if (multipleGrade.includes(valueInput)) {
    multipleGrade = multipleGrade.filter((item) => item != valueInput);
    hiddenGrade.value = multipleGrade;
    hiddenGradetBut.innerHTML = hiddenGrade.value;
  } else {
    if (multipleGrade.length != 3) {
      multipleGrade = [...multipleGrade, valueInput];
      hiddenGrade.value = multipleGrade;
      hiddenGradetBut.innerHTML = multipleGrade;
    }
  }
}

activ.forEach((item) => {
  item.addEventListener("click", function () {
    item.classList.toggle("activeGrade");
  });
});
// end become a teacher

// start Avatar

avatarImage.forEach((item, index) => {
  item.addEventListener("click", function () {
    hiddenAvatar.value = item.alt;
    hiddenAvatarBut.innerHTML = item.alt;
  });
});

// end Avatar

window.onscroll = function () {
  if (window.scrollY >= 700) {
    fix.style.top = 0;
  } else if (window.scrollY == 0) {
    fix.style.top = 0;
  } else {
    fix.style.top = "-64px";
  }
};

// start vedio
courseHead.forEach((item) => {
  item.addEventListener("click", function () {
    item.classList.toggle("vedioActive");
  });
});
// end vedio