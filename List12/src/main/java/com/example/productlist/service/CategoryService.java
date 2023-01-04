package com.example.productlist.service;

import com.example.productlist.entity.Category;
import com.example.productlist.repository.CategoryRepository;
import org.springframework.stereotype.Service;

import javax.persistence.EntityNotFoundException;
import java.util.List;
import java.util.Optional;

@Service
public class CategoryService {

    private final CategoryRepository categoryRepository;

    public CategoryService(CategoryRepository categoryRepository) {
        this.categoryRepository = categoryRepository;
    }
    private boolean isEmpty() {
        return categoryRepository.findAll().size() == 0;
    }

    public List<Category> getAllCategories() {
        return categoryRepository.findAll();
    }

    public void addCategory(Category product) {
        categoryRepository.save(product);
    }

    public Category getCategoryById(long id) {
        Optional<Category> category = categoryRepository.findById(id);
        return category.orElseThrow(EntityNotFoundException::new);
    }

    public Category getCategory(Category category) {
        return getCategoryById(category.getId());
    }

    public void updateCategory(Category category) {
        categoryRepository.save(category);
    }

    public void deleteCategory(Category category) {
        categoryRepository.deleteById(category.getId());
    }

    public void deleteCategoryById(long id) {
        categoryRepository.deleteById(id);
    }
}
