<?php

class Home extends Controller
{
    protected $viewModel;

    protected function Index()
    {
        $this->viewModel = new HomeModel();
        $this->returnView($this->viewModel->Index(), true);
    }

    protected function getAllSubjects()
    {
        $this->viewModel = new HomeModel();
        $arr = $this->viewModel->getAllSubjects();
        print_r($arr);
    }

    protected function getLessonsForSubject($id)
    {
        $this->viewModel = new HomeModel();

        print_r($this->viewModel->getLessonsForSubject($id));
    }

    protected function getModulesForLesson($id)
    {
        $this->viewModel = new HomeModel();
        print_r($this->viewModel->getModulesForLesson($id));
    }

    protected function getWorkbooksForModule($id)
    {
        $this->viewModel = new HomeModel();
        print_r($this->viewModel->getWorkbooksForModule($id));
    }

    protected function addSubject()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $res = $this->viewModel->addSubject($_POST['subject']);
            if ($res == false) {
                echo "Failed to add subject<br/>";
            } else {
                echo "Successfully added subject<br/>";
            }
        }
    }

    protected function addLesson()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $res = $this->viewModel->addLesson($_POST['subject'], $_POST['lesson']);
            if ($res == false) {
                echo "Failed to add lesson <br />";
            } else {
                echo "Successfully added lesson <br />";
            }
        }
    }

    protected function addModule()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $res = $this->viewModel->addModule($_POST['lesson'], $_POST['module']);
            if ($res == false) {
                echo "Failed to add Module <br />";
            } else {
                echo "Successfully added Module <br />";
            }
        }
    }

    protected function addWorkbook()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $res = $this->viewModel->addWorkbook($_POST['module'], $_POST['workbook']);
            if ($res == false) {
                echo "Failed to add Workbook <br />";
            } else {
                echo "Successfully added Workbook <br />";
            }
        }
    }

    protected function deleteSubject()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $res = $this->viewModel->deleteSubject($_POST['subject'], isset($_POST['delete-lessons']));
        }
    }
    protected function deleteLesson()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $res = $this->viewModel->deleteLesson($_POST['lesson'], isset($_POST['delete-modules']));
        }
    }
    protected function deleteModule()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $res = $this->viewModel->deleteModule($_POST['module'], isset($_POST['delete-workbooks']));
        }
    }
    protected function deleteWorkbook()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $res = $this->viewModel->deleteWorkbook($_POST['workbook']);
        }
    }

    protected function moveLesson()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $this->viewModel->moveLesson($_POST['subject'], $_POST['lesson']);
        }
    }
    protected function moveModule()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $this->viewModel->moveModule($_POST['lesson'], $_POST['module']);
        }
    }
    protected function moveWorkbook()
    {
        $this->viewModel = new HomeModel();
        if (isset($_POST['submit'])) {
            $this->viewModel->moveWorkbook($_POST['module'], $_POST['workbook']);
        }
    }
}
