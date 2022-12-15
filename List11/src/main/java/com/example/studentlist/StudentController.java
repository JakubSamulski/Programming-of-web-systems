package com.example.studentlist;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.text.DateFormat;
import java.util.Date;
import java.util.List;
import java.util.Locale;

@Controller
public class StudentController {
    private final StudentService studentService;

    public StudentController(StudentService studentService) {
        this.studentService = studentService;
    }

    @GetMapping("/student/")
    public String home(Locale locale, Model model) {
        Date date = new Date();
        DateFormat dateFormat = DateFormat.getDateTimeInstance(DateFormat.LONG,
                DateFormat.LONG, locale);
        String serverTime = dateFormat.format(date);
        model.addAttribute("serverTime", serverTime.toString() );
        List<Student> studentList = studentService.getAllStudent();
        model.addAttribute("studentList", studentList );
        return "student/index";
    }

    @GetMapping("/student/seed")
    public String seed() {
        studentService.seed();
        return "redirect:/student/";
    }


    @GetMapping("/student/add")
    public String add(Model model) {
        model.addAttribute("student", new Student() );
        return "student/add";
    }

    @PostMapping("/student/add")
    public String add(@ModelAttribute Student student) {
        studentService.addStudent(student);
        return "redirect:/student/";
    }


    // how to put a parameter in a query string
    // e.a. /student/details?id=3
    @GetMapping("/student/details")
    public String add(@RequestParam("id") long inputId, Model model) {
        model.addAttribute("student", studentService.getStudentById(inputId) );
        return "/student/details";
    }

    // how to put parameter in an URL
    // e.a. /student/3/edit
    @GetMapping(value = {"/student/{studId}/edit"})
    public String edit(Model model, @PathVariable Integer studId) {
        model.addAttribute("student", studentService.getStudentById(studId) );
        return "/student/edit";
    }

    @PostMapping(value = {"/student/edit"})
    public String edit(@ModelAttribute Student student) {
        studentService.updateStudent(student);
        return "redirect:/student/";
    }

    // how to put a parameter in a query string
    // e.a. /student/remove?id=3
    @GetMapping("/student/remove")
    public String remove(@RequestParam("id") long id) {
        studentService.deleteStudentById(id);
        return "redirect:/student/";
    }

}
