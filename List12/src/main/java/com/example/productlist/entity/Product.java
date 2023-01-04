package com.example.productlist.entity;

import lombok.*;

import javax.persistence.*;
import java.util.Objects;

@Getter
@Setter
@ToString
@AllArgsConstructor
@NoArgsConstructor
@Builder
@Entity
public class Product {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private long id;
    private String name;
    private double weight;
    private double price;

    @ManyToOne
    @JoinColumn(name = "FK_CategoryId")
    private Category category;

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Product product = (Product) o;
        return id == product.id && Double.compare(product.weight, weight) == 0 && Double.compare(product.price, price) == 0 && Objects.equals(name, product.name) && Objects.equals(category, product.category);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, name, weight, price, category);
    }
}
