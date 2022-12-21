package com.example.studentlist;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.text.DateFormat;
import java.util.Date;
import java.util.List;
import java.util.Locale;

@Controller
public class ProductController {
    private final ProductService productService;

    public ProductController(ProductService productService) {
        this.productService = productService;
    }

    @GetMapping("/product/")
    public String home(Locale locale, Model model) {
        Date date = new Date();
        DateFormat dateFormat = DateFormat.getDateTimeInstance(DateFormat.LONG,
                DateFormat.LONG, locale);
        String serverTime = dateFormat.format(date);
        model.addAttribute("serverTime", serverTime.toString() );
        List<Product> productList = productService.getAllStudent();
        model.addAttribute("productList", productList );
        return "product/index";
    }

    @GetMapping("/product/seed")
    public String seed() {
        productService.seed();
        return "redirect:/product/";
    }


    @GetMapping("/product/add")
    public String add(Model model) {
        model.addAttribute("product", new Product() );
        return "product/add";
    }

    @PostMapping("/product/add")
    public String add(@ModelAttribute Product product) {
        productService.addStudent(product);
        return "redirect:/product/";
    }


    // how to put a parameter in a query string
    // e.a. /student/details?id=3
    @GetMapping("/product/details")
    public String add(@RequestParam("id") long inputId, Model model) {
        model.addAttribute("product", productService.getStudentById(inputId) );
        return "/product/details";
    }

    // how to put parameter in an URL
    // e.a. /student/3/edit
    @GetMapping(value = {"/product/{prodId}/edit"})
    public String edit(Model model, @PathVariable Integer prodId) {
        model.addAttribute("product", productService.getStudentById(prodId) );
        return "/product/edit";
    }

    @PostMapping(value = {"/product/edit"})
    public String edit(@ModelAttribute Product product) {
        productService.updateStudent(product);
        return "redirect:/product/";
    }

    // how to put a parameter in a query string
    // e.a. /student/remove?id=3
    @GetMapping("/product/remove")
    public String remove(@RequestParam("id") long id) {
        productService.deleteStudentById(id);
        return "redirect:/product/";
    }

}
