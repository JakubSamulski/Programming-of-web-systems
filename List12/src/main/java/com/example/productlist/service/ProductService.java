package com.example.productlist.service;

import com.example.productlist.entity.Category;
import com.example.productlist.entity.Product;
import com.example.productlist.repository.ProductRepository;
import lombok.val;
import org.springframework.stereotype.Service;

import javax.persistence.EntityNotFoundException;
import java.util.List;
import java.util.Optional;

@Service
public class ProductService {

    private final ProductRepository productRepository;
    private final CategoryService categoryService;

    public ProductService(ProductRepository productRepository, CategoryService categoryService) {
        this.productRepository = productRepository;
        this.categoryService = categoryService;
    }

    public void seed() {
        val breadstuffCategory = Category.builder()
                .code("123")
                .name("pieczywo")
                .build();
        val dairyCategory = Category.builder()
                .code("321")
                .name("nabial")
                .build();

        categoryService.addCategory(breadstuffCategory);
        categoryService.addCategory(dairyCategory);

        this.addProduct(Product.builder()
                .name("Chleb")
                .weight(1)
                .price(10.8)
                .category(breadstuffCategory)
                .build());
        this.addProduct(Product.builder()
                .name("Bulka")
                .weight(0.1)
                .price(0.8)
                .category(breadstuffCategory)
                .build());
        this.addProduct(Product.builder()
                .name("Mleko")
                .weight(1)
                .price(2.5)
                .category(dairyCategory)
                .build());
    }

    private boolean isEmpty() {
        return productRepository.findAll().size() == 0;
    }

    public List<Product> getAllProducts() {
        return productRepository.findAll();
    }


    public void addProduct(Product product) {
        productRepository.save(product);
    }

    public Product getProductById(long id) {
        Optional<Product> product = productRepository.findById(id);
        return product.orElseThrow(EntityNotFoundException::new);
    }

    public Product getProduct(Product product) {
        return getProductById(product.getId());
    }

    public void updateProduct(Product product) {
        productRepository.save(product);
    }

    public void deleteProduct(Product product) {
        productRepository.deleteById(product.getId());
    }

    public void deleteProductById(long id) {
        productRepository.deleteById(id);
    }

}
