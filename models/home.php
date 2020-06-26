<?php
class HomeModel extends Model
{
    public function Index()
    {
        return;
    }

    public function getAllSubjects()
    {
        $subjectQuery = "SELECT * FROM `subject`";
        $this->query($subjectQuery);
        return json_encode($this->resultSet());
    }

    public function getLessonsForSubject($subjectId)
    {
        $lessonsQuery = "SELECT * FROM lesson WHERE subject_id = :subject_id";
        $this->query($lessonsQuery);
        $this->bind(":subject_id", $subjectId);
        return json_encode($this->resultSet());
    }

    public function getModulesForLesson($lessonId)
    {
        $modulesQuery = "SELECT * FROM module WHERE lesson_id = :lesson_id";
        $this->query($modulesQuery);
        $this->bind(":lesson_id", $lessonId);
        return json_encode($this->resultSet());
    }

    public function getWorkbooksForModule($moduleId)
    {
        $workbooksQuery = "SELECT * FROM workbook WHERE module_id = :module_id";
        $this->query($workbooksQuery);
        $this->bind(":module_id", $moduleId);
        return json_encode($this->resultSet());
    }

    public function addSubject($subjectName)
    {
        $addSubjectQuery = "INSERT INTO `subject` (`subject_name`) VALUES (:subject_name)";
        $this->query($addSubjectQuery);
        $this->bind(":subject_name", $subjectName);
        $this->execute();
        if ($this->lastInsertId()) {
            return $this->lastInsertId();
        }
        return false;
    }

    public function addLesson($subjectId, $lessonName)
    {
        $addlessonQuery = "INSERT INTO `lesson` (`subject_id`, `lesson_name`) VALUES (:subject_id, :lesson_name)";
        $this->query($addlessonQuery);
        $this->bind(":subject_id", $subjectId);
        $this->bind(":lesson_name", $lessonName);
        $this->execute();
        if ($this->lastInsertId()) {
            return $this->lastInsertId();
        }
        echo $subjectId + " " + $lessonName + "<br />";
        return false;
    }

    public function addModule($lessonId, $moduleName)
    {
        $addModuleQuery = "INSERT INTO `module` (`lesson_id`, `module_name`) VALUES (:lesson_id, :module_name)";
        $this->query($addModuleQuery);
        $this->bind(":lesson_id", $lessonId);
        $this->bind(":module_name", $moduleName);
        $this->execute();
        if ($this->lastInsertId()) {
            return $this->lastInsertId();
        }
        return false;
    }
    public function addWorkbook($moduleId, $workbookName)
    {
        $addWorkbookQuery = "INSERT INTO `workbook` (`module_id`, `workbook_name`) VALUES (:module_id, :workbook_name)";
        $this->query($addWorkbookQuery);
        $this->bind(":module_id", $moduleId);
        $this->bind(":workbook_name", $workbookName);
        $this->execute();
        if ($this->lastInsertId()) {
            return $this->lastInsertId();
        } else {
            return false;
        }
    }

    public function deleteSubject($id, $deleteBelow)
    {
        $deleteSubjectQuery = "DELETE FROM `subject` WHERE subject_id = :id";
        $this->query($deleteSubjectQuery);
        // print_r($deleteSubjectQuery);
        // echo $id;
        $this->bind(":id", $id);
        $this->execute();
        $checkIfDeletedQuery = "SELECT COUNT(*) FROM `subject` WHERE subject_id = :id";
        $this->query($checkIfDeletedQuery);
        $this->bind(":id", $id);
        $numRows = $this->fetchResult();
        if ($numRows['COUNT(*)'] > 0) {
            echo "Subject deletion Failed";
        } else {
            echo "Successfully deleted subject<br/>";
        }
        if ($deleteBelow) {
            $lessonsUnderSubject = json_decode($this->getLessonsForSubject($id));
            if (count($lessonsUnderSubject) > 0)
                foreach ($lessonsUnderSubject as $lesson) {
                    $this->deleteLesson($lesson->lesson_id, true);
                }
        }
    }

    public function deleteLesson($id, $deleteBelow)
    {
        $deleteLessonQuery = "DELETE FROM `lesson` WHERE lesson_id = :id";
        $this->query($deleteLessonQuery);
        $this->bind(":id", $id);
        $this->execute();
        $checkIfDeletedQuery = "SELECT COUNT(*) FROM `lesson` WHERE lesson_id = :id";
        $this->query($checkIfDeletedQuery);
        $this->bind(":id", $id);
        $numRows = $this->fetchResult();
        if ($numRows['COUNT(*)'] > 0) {
            echo "Lesson deletion Failed";
        } else {
            echo "Successfully deleted lesson<br/>";
        }
        if ($deleteBelow) {
            $modulesUnderLesson = json_decode($this->getModulesForLesson($id));
            if (count($modulesUnderLesson) > 0)
                foreach ($modulesUnderLesson as $module) {
                    $this->deleteModule($module->module_id, true);
                }
        }
    }

    public function deleteModule($id, $deleteBelow)
    {
        $deleteModuleQuery = "DELETE FROM `module` WHERE module_id = :id";
        $this->query($deleteModuleQuery);
        $this->bind(":id", $id);
        $this->execute();
        $checkIfDeletedQuery = "SELECT COUNT(*) FROM `module` WHERE module_id = :id";
        $this->query($checkIfDeletedQuery);
        $this->bind(":id", $id);
        $numRows = $this->fetchResult();
        if ($numRows['COUNT(*)'] > 0) {
            echo "Module deletion Failed";
        } else {
            echo "Successfully deleted module<br/>";
        }
        if ($deleteBelow) {
            $workbooksUnderModule = json_decode($this->getworkbooksForModule($id));
            if (count($workbooksUnderModule) > 0) {
                foreach ($workbooksUnderModule as $workbook) {
                    $this->deleteWorkbook($workbook->workbook_id);
                }
            }
        }
    }

    public function deleteWorkbook($id)
    {
        $deleteWorkbookQuery = "DELETE FROM `workbook` WHERE workbook_id = :id";
        $this->query($deleteWorkbookQuery);
        $this->bind(":id", $id);
        $this->execute();
        $checkIfDeletedQuery = "SELECT COUNT(*) FROM `workbook` WHERE workbook_id = :id";
        $this->query($checkIfDeletedQuery);
        $this->bind(":id", $id);
        $numRows = $this->fetchResult();
        if ($numRows['COUNT(*)'] > 0) {
            echo "Workbook deletion Failed";
        } else {
            echo "Successfully deleted workbook<br/>";
        }
    }
}
