package com.example.productlist.controller;

import com.example.productlist.entity.Product;
import com.example.productlist.service.CategoryService;
import com.example.productlist.service.ProductService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.text.DateFormat;
import java.util.Date;
import java.util.List;
import java.util.Locale;

@Controller
@RequestMapping("/product")
public class ProductController {
    private final ProductService productService;
    private final CategoryService categoryService;

    public ProductController(ProductService productService , CategoryService categoryService) {
        this.productService = productService;
        this.categoryService = categoryService;
    }

    @GetMapping
    public String home(Locale locale, Model model) {
        Date date = new Date();
        DateFormat dateFormat = DateFormat.getDateTimeInstance(DateFormat.LONG,
                DateFormat.LONG, locale);
        String serverTime = dateFormat.format(date);
        model.addAttribute("serverTime", serverTime.toString());
        List<Product> productList = productService.getAllProducts();
        model.addAttribute("productList", productList);
        return "product/index";
    }

    @GetMapping("/seed")
    public String seed() {
        productService.seed();
        return "redirect:/product/";
    }


    @GetMapping("/add")
    public String add(Model model) {
        model.addAttribute("categoryList",categoryService.getAllCategories());
        model.addAttribute("product", new Product());
        return "product/add";
    }

    @PostMapping("/add")
    public String add(@ModelAttribute Product product) {
        System.out.println(product.getCategory());
        productService.addProduct(product);
        return "redirect:/product/";
    }


    // how to put a parameter in a query string
    // e.a. /student/details?id=3
    @GetMapping("/details")
    public String add(@RequestParam("id") long inputId, Model model) {
        model.addAttribute("product", productService.getProductById(inputId));
        return "/product/details";
    }

    // how to put parameter in an URL
    // e.a. /student/3/edit
    @GetMapping(value = {"/{prodId}/edit"})
    public String edit(Model model, @PathVariable Integer prodId) {
        model.addAttribute("product", productService.getProductById(prodId));
        return "/product/edit";
    }

    @PostMapping(value = {"/edit"})
    public String edit(@ModelAttribute Product product) {
        productService.updateProduct(product);
        return "redirect:/product/";
    }

    // how to put a parameter in a query string
    // e.a. /student/remove?id=3
    @GetMapping("/remove")
    public String remove(@RequestParam("id") long id) {
        productService.deleteProductById(id);
        return "redirect:/product/";
    }

}
