const hiddenSubject = document.getElementById("hiddenSubject");
const hiddenGrade = document.getElementById("hiddenGrade");
const hiddenSubjectBut = document.getElementById("hiddenSubjectBut");
const hiddenGradetBut = document.getElementById("hiddenGradetBut");
const avatarImage = document.querySelectorAll(".modal-content img");
const hiddenAvatar = document.getElementById("hiddenAvatar");
const hiddenAvatarBut = document.getElementById("hiddenAvatarBut");
const fix = document.querySelector(".fix");
// start become a teacher
var multipleGrade = [];

function createValueInputSubject(valueInput,idInput) {
  hiddenSubject.value = idInput;
  hiddenSubjectBut.innerHTML = valueInput;
}
function createValueInputGrade(valueInput,idInput) {
    hiddenGrade.value = idInput;
    hiddenGradetBut.innerHTML = valueInput;
}

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

// start create classes

var gradeClasses = [];
const hiddenGradeClasses = document.getElementById("hiddenGradeClasses");
const hiddenGradetButClasses = document.getElementById('hiddenGradetButClasses');
function createValueInputGradeClasses(valueInput) {
  hiddenGradeClasses.value = valueInput;
  hiddenGradetButClasses.innerHTML = valueInput;
}

var DayClasses = [];
const hiddenDayClasses = document.getElementById("hiddenDayClasses");
const hiddenDayButClasses = document.getElementById('hiddenDayButClasses');
function createValueInputDayClasses(valueInput) {
  hiddenDayClasses.value = valueInput;
  hiddenDayButClasses.innerHTML = valueInput;
}

var DayClasses1 = [];
const hiddenDayClasses1 = document.getElementById("hiddenDayClasses1");
const hiddenDayButClasses1 = document.getElementById('hiddenDayButClasses1');
function createValueInputDayClasses1(valueInput) {
  hiddenDayClasses1.value = valueInput;
  hiddenDayButClasses1.innerHTML = valueInput;
}
var HoursClasses = [];
const hiddenHoursClasses = document.getElementById("hiddenHoursClasses");
const hiddenHoursButClasses = document.getElementById('hiddenHoursButClasses');
function createValueInputHoursClasses(valueInput) {
  hiddenHoursClasses.value = valueInput;
  hiddenHoursButClasses.innerHTML = valueInput;
}


var multipleStudent = []
const hiddenStudent = document.getElementById("hiddenStudent");
const hiddenStudenttBut = document.getElementById('hiddenStudenttBut');

// function createValueInputGrade(valueInput) {
//   if (multipleStudent.includes(valueInput)) {
//     multipleStudent = multipleStudent.filter((item) => item != valueInput);
//     hiddenStudent.value = multipleStudent;
//     hiddenStudenttBut.innerHTML = hiddenStudent.value;
//   } else {
//     multipleStudent = [...multipleStudent, valueInput];
//     hiddenStudent.value = multipleStudent;
//     hiddenStudenttBut.innerHTML = multipleStudent;
//   }
// }

const plus = document.getElementById('plus')
const inputPlus = document.querySelectorAll('#inputPlus')
plus.onclick = function (e) {
  e.preventDefault();
  inputPlus.forEach(item => {
    item.classList.toggle('show')
  })
}
console.log(document.getElementById('gehad'))
// end create classes