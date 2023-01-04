package com.example.productlist.controller;

import com.example.productlist.entity.Category;
import com.example.productlist.service.CategoryService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.text.DateFormat;
import java.util.Date;
import java.util.List;
import java.util.Locale;

@Controller
@RequestMapping("/category")
public class CategoryController {

    private final CategoryService categoryService;

    public CategoryController(CategoryService categoryService) {
        this.categoryService = categoryService;
    }

    @GetMapping
    public String home(Locale locale, Model model) {
        Date date = new Date();
        DateFormat dateFormat = DateFormat.getDateTimeInstance(DateFormat.LONG,
                DateFormat.LONG, locale);
        String serverTime = dateFormat.format(date);
        model.addAttribute("serverTime", serverTime.toString());
        List<Category> categoryList = categoryService.getAllCategories();
        model.addAttribute("categoryList", categoryList);
        return "category/index";
    }


    @GetMapping("/add")
    public String add(Model model) {
        model.addAttribute("category", new Category());
        return "category/add";
    }

    @PostMapping("/add")
    public String add(@ModelAttribute Category category) {
        categoryService.addCategory(category);
        return "redirect:/category";
    }


    @GetMapping("/details")
    public String add(@RequestParam("id") long inputId, Model model) {
        model.addAttribute("product", categoryService.getCategoryById(inputId));
        return "/category/details";
    }

    @GetMapping(value = {"/{categoryId}/edit"})
    public String edit(Model model, @PathVariable Integer categoryId) {
        model.addAttribute("category", categoryService.getCategoryById(categoryId));
        return "/category/edit";
    }

    @PostMapping(value = {"/edit"})
    public String edit(@ModelAttribute Category category) {
        categoryService.updateCategory(category);
        return "redirect:/category/";
    }

    @GetMapping("/remove")
    public String remove(@RequestParam("id") long id) {
        categoryService.deleteCategoryById(id);
        return "redirect:/category/";
    }
}
