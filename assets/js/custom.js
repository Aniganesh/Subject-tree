"use strict";
// // // // // // // // // // //
// //  Const declarations  // //
// // // // // // // // // // //

const actionsButton = document.querySelector("#actions");
const actionCards = document.querySelectorAll(".card");
const mainArea = document.querySelector("#main-area");
const addSubjectButton = document.querySelector("#add-subject-button");
const addLessonButton = document.querySelector("#add-lesson-button");
const addModuleButton = document.querySelector("#add-module-button");
const addWorkbookButton = document.querySelector("#add-workbook-button");
const searchInput = document.querySelector("#search-text");

const performAction = (event) => {
  if (!event.target.classList.contains("dropdown-item")) {
    return;
  }
  if (event.target.getAttribute("id") == "add-subject") {
    displaySubjectCard();
    return;
  }
  if (event.target.getAttribute("id") == "add-lesson") {
    displayLessonCard();
    return;
  }
  if (event.target.getAttribute("id") == "add-module") {
    displayModuleCard();
    return;
  }
  if (event.target.getAttribute("id") == "add-workbook") {
    displayWorkbookCard();
    return;
  }
  if (event.target.getAttribute("id") == "delete-subject") {
    displayDeleteSubjectCard();
    return;
  }
  if (event.target.getAttribute("id") == "delete-lesson") {
    displayDeleteLessonCard();
    return;
  }
  if (event.target.getAttribute("id") == "delete-module") {
    displayDeleteModuleCard();
    return;
  }
  if (event.target.getAttribute("id") == "delete-workbook") {
    displayDeleteWorkbookCard();
    return;
  }
  if (event.target.getAttribute("id") == "move-lesson") {
    displayMoveLessonCard();
    return;
  }
  if (event.target.getAttribute("id") == "move-module") {
    displayMoveModuleCard();
    return;
  }
  if (event.target.getAttribute("id") == "move-workbook") {
    displayMoveWorkbookCard();
    return;
  }
};

// // // // // // // // // // // // // // // // // //
// // Functions to display/close various cards  // //
// // // // // // // // // // // // // // // // // //

const displaySubjectCard = () => {
  if (
    document.querySelector("#add-subject-card").classList.contains("d-none")
  ) {
    document.querySelector("#add-subject-card").classList.remove("d-none");
  }
};

const displayLessonCard = () => {
  if (document.querySelector("#add-lesson-card").classList.contains("d-none")) {
    document.querySelector("#add-lesson-card").classList.remove("d-none");
  }
};

const displayModuleCard = () => {
  if (document.querySelector("#add-module-card").classList.contains("d-none")) {
    document.querySelector("#add-module-card").classList.remove("d-none");
  }
};
const displayWorkbookCard = () => {
  if (
    document.querySelector("#add-workbook-card").classList.contains("d-none")
  ) {
    document.querySelector("#add-workbook-card").classList.remove("d-none");
  }
};
const displayDeleteSubjectCard = () => {
  if (
    document.querySelector("#delete-subject-card").classList.contains("d-none")
  ) {
    document.querySelector("#delete-subject-card").classList.remove("d-none");
  }
};
const displayDeleteLessonCard = () => {
  if (
    document.querySelector("#delete-lesson-card").classList.contains("d-none")
  ) {
    document.querySelector("#delete-lesson-card").classList.remove("d-none");
  }
};
const displayDeleteModuleCard = () => {
  if (
    document.querySelector("#delete-module-card").classList.contains("d-none")
  ) {
    document.querySelector("#delete-module-card").classList.remove("d-none");
  }
};
const displayDeleteWorkbookCard = () => {
  if (
    document.querySelector("#delete-workbook-card").classList.contains("d-none")
  ) {
    document.querySelector("#delete-workbook-card").classList.remove("d-none");
  }
};
const displayMoveLessonCard = () => {
  if (
    document.querySelector("#move-lesson-card").classList.contains("d-none")
  ) {
    document.querySelector("#move-lesson-card").classList.remove("d-none");
  }
};
const displayMoveModuleCard = () => {
  if (
    document.querySelector("#move-module-card").classList.contains("d-none")
  ) {
    document.querySelector("#move-module-card").classList.remove("d-none");
  }
};
const displayMoveWorkbookCard = () => {
  if (
    document.querySelector("#move-workbook-card").classList.contains("d-none")
  ) {
    document.querySelector("#move-workbook-card").classList.remove("d-none");
  }
};

const closeCard = (event) => {
  if (event.target.classList.contains("close")) {
    event.target.parentElement.parentElement.parentElement.classList.add(
      "d-none"
    );
  }
};

// // // // // // // // // // // // // // //
// //  Display and hide nodes on click // //
// // // // // // // // // // // // // // //

const manageNodes = (event) => {
  if (event.target.classList.contains("subject")) {
    const lessons = event.target.querySelectorAll(".lesson");

    [...lessons].forEach((lesson) => {
      if (lesson.classList.contains("d-none")) {
        lesson.classList.remove("d-none");
      } else {
        lesson.classList.add("d-none");
      }
    });

    return;
  }

  if (event.target.parentElement.classList.contains("lesson")) {
    const modules = event.target.querySelectorAll(".module");

    [...modules].forEach((Module) => {
      if (Module.classList.contains("d-none")) {
        Module.classList.remove("d-none");
      } else {
        Module.classList.add("d-none");
      }
    });
    return;
  }

  if (event.target.parentElement.classList.contains("module")) {
    const workbooks = event.target.querySelectorAll("ul");
    [...workbooks].forEach((workbook) => {
      if (workbook.classList.contains("d-none")) {
        workbook.classList.remove("d-none");
      } else {
        workbook.classList.add("d-none");
      }
    });
  }
};

// // // // // // // // // // // // //
// //  Various utility functions // //
// // // // // // // // // // // // //

const toastMessage = (text) => {
  const toast = createDivWithClass("toast");
  const toastHeader = createDivWithClass("toast-header");
  toast.appendChild(toastHeader);
  toast.classList.add("m-1");
  toastHeader.innerHTML = `<strong class="mr-auto">Information</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>`;
  const toastBody = createDivWithClass("toast-body");
  toastBody.innerText = text;
  toast.appendChild(toastBody);
  document.querySelector("#toast-area").appendChild(toast);
  const alltoasts = document.querySelectorAll(".toast");
  alltoasts.forEach((toast) => {
    if (toast.classList.contains("hide")) {
      toast.parentElement.removeChild(toast);
    }
  });
  $(".toast").toast({ animation: true, autohide: true, delay: 3000 });
  $(".toast").toast("show");
};

const getCorrectXHR = () => {
  let XHR;

  if (window.XMLHttpRequest) {
    XHR = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    XHR = new ActiveXObject("Microsoft.XMLHTTP");
  }

  return XHR;
};

const createDivWithClass = (className) => {
  const div = document.createElement("div");
  div.classList.add(className);
  return div;
};

const createLiWithText = (text) => {
  const li = document.createElement("li");
  li.innerText = text;
  return li;
};

const createOption = (id, text) => {
  const option = document.createElement("option");
  option.value = id;
  option.innerText = text;
  return option;
};

// // // // // // // // // // // // // // // // // // // // // // // // // // // //
// //  Load various nodes into the main area and add to the options in cards  // //
// // // // // // // // // // // // // // // // // // // // // // // // // // // //

const getWorkbooksForModule = (moduleUL, moduleId) => {
  const XHR = getCorrectXHR();
  XHR.onreadystatechange = () => {
    if (XHR.readyState == XHR.DONE && XHR.status == 200) {
      let response = JSON.parse(XHR.responseText);
      const deleteWorkbookCardSelectElement = document.querySelector(
        "#workbook-to-delete"
      );
      const moveWorkbookCardSelectElement = document.querySelector(
        "#workbook-to-move"
      );

      [...response].forEach((workbook) => {
        const li = createLiWithText(workbook["workbook_name"]);
        moduleUL.appendChild(li);
        moduleUL.classList.add("list-group-flush");
        li.classList.add("list-group-item");
        li.classList.add("cursor-normal");
        deleteWorkbookCardSelectElement.appendChild(
          createOption(workbook["workbook_id"], workbook["workbook_name"])
        );
        moveWorkbookCardSelectElement.appendChild(
          createOption(workbook["workbook_id"], workbook["workbook_name"])
        );
      });
      const countSpan = document.createElement("span");
      countSpan.innerHTML = "(" + response.length + ") workbooks";
      moduleUL.parentElement.appendChild(countSpan);
    }
  };
  XHR.open("GET", "home/getWorkbooksForModule/" + moduleId, true);
  XHR.send();
};

const getModulesForLesson = (lessonUL, lessonId) => {
  const XHR = getCorrectXHR();
  XHR.onreadystatechange = () => {
    if (XHR.readyState == XHR.DONE && XHR.status == 200) {
      let response = JSON.parse(XHR.responseText);
      const addWorkbookCardSelectElement = document.querySelector(
        "#module-for-workbook"
      );
      const deleteModuleCardSelectElement = document.querySelector(
        "#module-to-delete"
      );
      const moveWorkbookCardSelectElement = document.querySelector(
        "#module-to-move-workbook-to"
      );
      const moveModuleCardSelectElement = document.querySelector(
        "#module-to-move"
      );
      [...response].forEach((Module) => {
        const li = createLiWithText(Module["module_name"]);
        const moduleUL = document.createElement("ul");
        lessonUL.classList.add("module");
        moduleUL.classList.add("d-none");
        moduleUL.classList.add("list-group-flush");
        li.classList.add("list-group-item");
        li.appendChild(moduleUL);
        lessonUL.appendChild(li);
        getWorkbooksForModule(moduleUL, Module["module_id"]);

        addWorkbookCardSelectElement.appendChild(
          createOption(Module["module_id"], Module["module_name"])
        );
        deleteModuleCardSelectElement.appendChild(
          createOption(Module["module_id"], Module["module_name"])
        );
        moveWorkbookCardSelectElement.appendChild(
          createOption(Module["module_id"], Module["module_name"])
        );
        moveModuleCardSelectElement.appendChild(
          createOption(Module["module_id"], Module["module_name"])
        );
      });
      const countSpan = document.createElement("span");
      countSpan.innerHTML = "(" + response.length + ") modules";
      lessonUL.parentElement.appendChild(countSpan);
    }
  };
  XHR.open("GET", "home/getModulesForLesson/" + lessonId, true);
  XHR.send();
};

const getLessonsForSub = (subjectUL, subId) => {
  const XHR = getCorrectXHR();
  XHR.onreadystatechange = () => {
    if (XHR.readyState == XHR.DONE && XHR.status == 200) {
      let response = JSON.parse(XHR.responseText);
      const addModuleCardSelectElement = document.querySelector(
        "#lesson-for-module"
      );
      const deleteLessonCardSelectElement = document.querySelector(
        "#lesson-to-delete"
      );
      const moveModuleCardSelectElement = document.querySelector(
        "#lesson-to-move-module-to"
      );
      const moveLessonCardSelectElement = document.querySelector(
        "#lesson-to-move"
      );

      [...response].forEach((lesson) => {
        const li = createLiWithText(lesson["lesson_name"]);
        const lessonUL = document.createElement("ul");
        subjectUL.classList.add("lesson");
        lessonUL.classList.add("d-none");
        lessonUL.classList.add("list-group-flush");
        li.classList.add("list-group-item");
        li.appendChild(lessonUL);
        getModulesForLesson(lessonUL, lesson["lesson_id"]);
        subjectUL.appendChild(li);

        addModuleCardSelectElement.appendChild(
          createOption(lesson["lesson_id"], lesson["lesson_name"])
        );
        deleteLessonCardSelectElement.appendChild(
          createOption(lesson["lesson_id"], lesson["lesson_name"])
        );
        moveModuleCardSelectElement.appendChild(
          createOption(lesson["lesson_id"], lesson["lesson_name"])
        );
        moveLessonCardSelectElement.appendChild(
          createOption(lesson["lesson_id"], lesson["lesson_name"])
        );
      });
      const countSpan = document.createElement("span");
      countSpan.innerHTML = "(" + response.length + ") lessons";
      subjectUL.parentElement.appendChild(countSpan);
    }
  };

  XHR.open("GET", "home/getlessonsforsubject/" + subId, true);
  XHR.send();
};

const getAllNodes = () => {
  const XHR = getCorrectXHR();
  XHR.onreadystatechange = () => {
    if (XHR.readyState == XHR.DONE && XHR.status == 200) {
      let response = JSON.parse(XHR.responseText);
      const ul = document.createElement("ul");

      const addLessonCardSelectElement = document.querySelector(
        "#subject-for-lesson"
      );
      const deleteSubjectCardSelectElement = document.querySelector(
        "#subject-to-delete"
      );
      const moveLessonCardSelectElement = document.querySelector(
        "#subject-to-move-lesson-to"
      );

      [...response].forEach((subject) => {
        const li = document.createElement("li");
        const subul = document.createElement("ul");
        subul.classList.add("d-none");
        li.classList.add("subject");
        li.innerText = subject["subject_name"];
        li.appendChild(subul);
        getLessonsForSub(subul, subject["subject_id"]);
        ul.appendChild(li);
        ul.classList.add("list-group-flush");
        const classesToAdd = ["list-group-item", "cursor-pointer"];
        classesToAdd.forEach((className) => li.classList.add(className));

        addLessonCardSelectElement.appendChild(
          createOption(subject["subject_id"], subject["subject_name"])
        );
        deleteSubjectCardSelectElement.appendChild(
          createOption(subject["subject_id"], subject["subject_name"])
        );
        moveLessonCardSelectElement.appendChild(
          createOption(subject["subject_id"], subject["subject_name"])
        );
      });
      mainArea.appendChild(ul);
    }
  };
  XHR.open("GET", "home/getallsubjects/", true);
  XHR.send();
};

// // // // // // // // // // //
// // Search functionality // //
// // // // // // // // // // //

const searchForKey = (event) => {
  const searchTerm = event.target.value;
  const allSubjects = mainArea.querySelectorAll(".subject");
  if (searchTerm == "") {
    allSubjects.forEach((subject) => {
      subject.classList.remove("d-none");
    });
    return;
  }
  let countFound = 0;
  allSubjects.forEach((subject) => {
    if (subject.innerHTML.search(searchTerm) == -1) {
      if (!subject.classList.contains("d-none")) {
        subject.classList.add("d-none");
      }
    } else {
      ++countFound;
      if (subject.classList.contains("d-none")) {
        subject.classList.remove("d-none");
      }
    }
  });
  if (countFound > 0) {
    toastMessage("Your search query has been found in the following subjects:");
  } else {
    toastMessage("Your search query has not been found");
  }
};

// // // // // // // // // // // //
// Attach event listeners here// //
// // // // // // // // // // // //

searchInput.addEventListener("change", searchForKey);
mainArea.addEventListener("click", manageNodes);
actionCards.forEach((card) => card.addEventListener("click", closeCard));
actions.addEventListener("click", performAction);
getAllNodes();
