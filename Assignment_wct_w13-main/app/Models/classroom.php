<?php

namespace App\Models;

class Classroom
{
    protected static $data = [
       'students' => [
    ['id' => 1, 'name' => 'Dara Sok', 'age' => 20],
    ['id' => 2, 'name' => 'Janny Ta', 'age' => 22],
    ['id' => 3, 'name' => 'Mengly Vong', 'age' => 21],
    ['id' => 4, 'name' => 'Roth Lina', 'age' => 23],
    ['id' => 5, 'name' => 'Sophy Chan', 'age' => 19],
    ['id' => 6, 'name' => 'Kimleng Moeun', 'age' => 24],
    ['id' => 7, 'name' => 'Vannak Khiev', 'age' => 20],
    ['id' => 8, 'name' => 'Chenda Im', 'age' => 22],
],

'teachers' => [
    ['id' => 1, 'name' => 'Mr. Vuth', 'subject' => 'Math'],
    ['id' => 2, 'name' => 'Ms. Lisa', 'subject' => 'English'],
    ['id' => 3, 'name' => 'Mr. Dara', 'subject' => 'Physics'],
    ['id' => 4, 'name' => 'Ms. Sovann', 'subject' => 'Biology'],
    ['id' => 5, 'name' => 'Mr. Rith', 'subject' => 'Chemistry'],
],

    ];

    // ==== Students ====
    public static function getStudents()
    {
        return self::$data['students'];
    }

    public static function addStudent($student)
    {
        foreach (self::$data['students'] as $s) {
            if ($s['id'] == $student['id']) return false;
        }
        self::$data['students'][] = $student;
        return true;
    }

    public static function updateStudent($id, $data)
    {
        foreach (self::$data['students'] as &$student) {
            if ($student['id'] == $id) {
                $student = array_merge($student, $data);
                return $student;
            }
        }
        return null;
    }

    public static function deleteStudent($id)
    {
        foreach (self::$data['students'] as $i => $student) {
            if ($student['id'] == $id) {
                unset(self::$data['students'][$i]);
                self::$data['students'] = array_values(self::$data['students']);
                return true;
            }
        }
        return false;
    }

    // ==== Teachers ====
    public static function getTeachers()
    {
        return self::$data['teachers'];
    }

    public static function addTeacher($teacher)
    {
        foreach (self::$data['teachers'] as $t) {
            if ($t['id'] == $teacher['id']) return false;
        }
        self::$data['teachers'][] = $teacher;
        return true;
    }

    public static function updateTeacher($id, $data)
    {
        foreach (self::$data['teachers'] as &$teacher) {
            if ($teacher['id'] == $id) {
                $teacher = array_merge($teacher, $data);
                return $teacher;
            }
        }
        return null;
    }

    public static function deleteTeacher($id)
    {
        foreach (self::$data['teachers'] as $i => $teacher) {
            if ($teacher['id'] == $id) {
                unset(self::$data['teachers'][$i]);
                self::$data['teachers'] = array_values(self::$data['teachers']);
                return true;
            }
        }
        return false;
    }
}