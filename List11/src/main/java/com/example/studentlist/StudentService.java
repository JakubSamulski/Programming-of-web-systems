package com.example.studentlist;

import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
public class StudentService {
    ArrayList<Student> studentList=new ArrayList<>();

    public StudentService() {
    }

    public void seed(){
        studentList.add(new Student(1,"Adam","Fox",12345,"stud1","abc"));
        studentList.add(new Student(2,"Ewa","Snake",12346,"stud2","aaa"));
        studentList.add(new Student(3,"John","Brown",22222,"stud3","eightstars"));
    }

    private boolean isEmpty() {
        return studentList.size() == 0;
    }

    public List<Student> getAllStudent() {
        return studentList;
    }

    public void addStudent(Student student) {
        studentList.add(student);
    }
    public Student getStudentById(long id) {
        for(Student student:studentList){
            if(student.getId()==id)
                return student;
        }
        return null;
    }
    public Student getStudent(Student student){
        return getStudentById(student.getId());
    }
    public void updateStudent(Student student) {
        deleteStudent(student);
        studentList.add(student);
    }
    public void deleteStudent(Student student) {
        studentList.remove(getStudentById(student.getId()));
    }
    public void deleteStudentById(long id) {
        studentList.remove(getStudentById(id));
    }

}
