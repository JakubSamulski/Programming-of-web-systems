package com.example.productlist;

import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
public class ProductService {
    ArrayList<Product> productList = new ArrayList<>();

    public ProductService() {
    }

    public void seed() {
//        productList.add(new Product(1, "Chleb", 1, 10.8, "pieczywo"));
//        productList.add(new Product(2, "Bulka", 0.1, 0.8, "pieczywo"));
//        productList.add(new Product(3, "Mleko", 1, 2.5, "nabial"));
    }

    private boolean isEmpty() {
        return productList.size() == 0;
    }

    public List<Product> getAllProducts() {
        return productList;
    }

    public void addProduct(Product product) {
        if (getProductById(product.getId()) == null) {
            productList.add(product);
        }
    }

    public Product getProductById(long id) {
        for (Product product : productList) {
            if (product.getId() == id)
                return product;
        }
        return null;
    }

    public Product getProduct(Product product) {
        return getProductById(product.getId());
    }

    public void updateProduct(Product product) {
        deleteProduct(product);
        productList.add(product);
    }

    public void deleteProduct(Product product) {
        productList.remove(getProductById(product.getId()));
    }

    public void deleteProductById(long id) {
        productList.remove(getProductById(id));
    }

}
