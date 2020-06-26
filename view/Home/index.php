<?php include "assets/html/header.php"; ?>
<title>Subject tree | Home</title>
<div id="toast-area"></div>
<div class="d-flex justify-content-between" style="max-width: 100vw; flex-wrap:wrap">
    <div class="p-2 main-area" id="main-area">
        <div style="max-width: 600px;">
            The following are the subjects.<br />
            Click on a subject to see its lessons.
            Click on a lesson to see its modules and click on a module to see its workbooks.<br />
            Add or delete subjects, lessons, modules and workbooks from the Actions tab above.<br />
        </div>
    </div>
    <div class="p-2 align-self-start">
        <div class="card m-1 d-none add-card" id="add-subject-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Add Subject</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form action="home/addSubject" method="POST" class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="Name of new subject" required /><br />
                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="add-subject-button">Add</button>
                </form>
            </div>
        </div>
        <div class="card m-2 d-none add-card" id="add-lesson-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Add Lesson</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form class="form-group" action="home/addlesson" method="POST">
                    <select name="subject" class="custom-select" id="subject-for-lesson" required>
                        <option selected disabled value="----">--Select a subject for the new lesson--</option>
                    </select>
                    <input type="text" class="form-control" name="lesson" placeholder="Name of lesson" required /><br />
                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="add-lesson-button">Add</button>
                </form>
            </div>
        </div>
        <div class="card m-2 d-none add-card" id="add-module-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Add Module</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form class="form-group" action="home/addModule" method="POST">
                    <select name="lesson" id="lesson-for-module" class="custom-select" required>
                        <option selected disabled value="----">--Select a lesson for the new module--</option>
                    </select>
                    <input type="text" class="form-control" name="module" placeholder="Name of module" required /><br />
                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="add-module-button">Add</button>
                </form>
            </div>
        </div>
        <div class="card m-2 d-none add-card" id="add-workbook-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Add Workbook</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form class="form-group" action="home/addWorkbook" method="POST">
                    <select name="module" id="module-for-workbook" class="custom-select" required>
                        <option selected disabled value="----">--Select a module for the new workbook--</option>
                    </select>

                    <input type="text" class="form-control" name="workbook" placeholder="Name of workbook" required /><br />
                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="add-workbook-button">Add</button>
                </form>
            </div>
        </div>
        <div class="card m-1 d-none add-card" id="delete-subject-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Delete Subject</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form action="home/deleteSubject" method="POST" class="form-group">
                    <select name="subject" class="custom-select" id="subject-to-delete" required>
                        <option selected disabled value="----">--Select the subject to be deleted--</option>
                    </select>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="delete-lessons" id="delete-lessons" />
                        <label class="form-check-label" for="delete-lessons">Delete all lessons, modules and workbooks under this subject</label>
                    </div>

                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="delete-subject-button">Delete</button>
                </form>
            </div>
        </div>
        <div class="card m-2 d-none add-card" id="delete-lesson-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Delete Lesson</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form class="form-group" action="home/deletelesson" method="POST">
                    <select name="lesson" class="custom-select" id="lesson-to-delete" required>
                        <option selected disabled value="----">--Select the lesson to be deleted--</option>
                    </select>
                    <div class="form-check">
                        <input type="checkbox" name="delete-modules" class="form-check-input" id="delete-modules" />
                        <label class="form-check-label" for="delete-modules">Delete all modules and workbooks under this lesson</label>
                    </div>

                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="delete-lesson-button">Delete</button>
                </form>
            </div>
        </div>
        <div class="card m-2 d-none add-card" id="delete-module-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Delete Module</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form class="form-group" action="home/deleteModule" method="POST">
                    <select name="module" id="module-to-delete" class="custom-select" required>
                        <option selected disabled value="----">--Select the module to be deleted--</option>
                    </select>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="delete-workbooks" id="delete-workbooks" />
                        <label class="form-check-label" for="delete-workbooks">Delete all workbooks under this module</label>
                    </div>
                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="delete-module-button">Delete</button>
                </form>
            </div>
        </div>
        <div class="card m-2 d-none add-card" id="delete-workbook-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Delete Workbook</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form class="form-group" action="home/deleteWorkbook" method="POST">
                    <select name="workbook" id="workbook-to-delete" class="custom-select" required>
                        <option selected disabled value="----">--Select the workbook to be deleted--</option>
                    </select>
                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="delete-workbook-button">Delete</button>
                </form>
            </div>
        </div>
        <div class="card m-2 d-none add-card" id="move-lesson-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Move Lesson</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form class="form-group" action="home/movelesson" method="POST">
                    <select name="subject" class="custom-select" id="subject-to-move-lesson-to" required>
                        <option selected disabled value="----">--Select the subject to move the lesson to--</option>
                    </select>
                    <select name="lesson" class="custom-select" id="lesson-to-move" required>
                        <option selected disabled value="----">--Select the lesson to be moved--</option>
                    </select>
                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="move-lesson-button">Move</button>
                </form>
            </div>
        </div>
        <div class="card m-2 d-none add-card" id="move-module-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Move Module</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form class="form-group" action="home/moveModule" method="POST">
                    <select name="lesson" id="lesson-to-move-module-to" class="custom-select" required>
                        <option selected disabled value="----">--Select the lesson to move module to--</option>
                    </select>
                    <select name="module" id="module-to-move" class="custom-select" required>
                        <option selected disabled value="----">--Select the module to be moved--</option>
                    </select>
                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="move-module-button">Move</button>
                </form>
            </div>
        </div>
        <div class="card m-2 d-none add-card" id="move-workbook-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Delete Workbook</h5>
                    <div class="close" aria-label="close">x</div>
                </div>
                <form class="form-group" action="home/moveWorkbook" method="POST">
                    <select name="module" id="module-to-move-workbook-to" class="custom-select" required>
                        <option selected disabled value="----">--Select the module to move the workbook to--</option>
                    </select>
                    <select name="workbook" id="workbook-to-move" class="custom-select" required>
                        <option selected disabled value="----">--Select the workbook to be moved--</option>
                    </select>
                    <button type="submit" name="submit" class="btn-theme btn-theme-full p-2" id="move-workbook-button">Move</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="total-nodes"></div>
<?php
include "assets/html/footer.php";
