package com.example.studentlist;

import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
public class ProductService {
    ArrayList<Product> productList=new ArrayList<>();

    public ProductService() {
    }

    public void seed(){
        productList.add(new Product(1,"Adam",1,2,"abc"));
    }

    private boolean isEmpty() {
        return productList.size() == 0;
    }

    public List<Product> getAllStudent() {
        return productList;
    }

    public void addStudent(Product student) {
        productList.add(student);
    }
    public Product getStudentById(long id) {
        for(Product student:productList){
            if(student.getId()==id)
                return student;
        }
        return null;
    }
    public Product getStudent(Product student){
        return getStudentById(student.getId());
    }
    public void updateStudent(Product student) {
        deleteStudent(student);
        productList.add(student);
    }
    public void deleteStudent(Product student) {
        productList.remove(getStudentById(student.getId()));
    }
    public void deleteStudentById(long id) {
        productList.remove(getStudentById(id));
    }

}
