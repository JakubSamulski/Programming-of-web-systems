package com.example.productlist.entity;

import lombok.*;

import javax.persistence.*;
import java.util.List;
import java.util.Objects;

@Getter
@Setter
@ToString
@AllArgsConstructor
@NoArgsConstructor
@Builder
@Entity

public class Category {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private long id;
    private String name;
    private String code;

    @OneToMany(mappedBy = "category")
    @ToString.Exclude
    private List<Product> product;

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Category category = (Category) o;
        return id == category.id && Objects.equals(name, category.name) && Objects.equals(code, category.code) && Objects.equals(product, category.product);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, name, code, product);
    }
}
