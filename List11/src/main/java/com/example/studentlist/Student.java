package com.example.studentlist;

public class Student {
    private long id;
    private String firstName;
    private String lastName;
    private int index;
    private String login;
    private String password;

    public Student() {
    }

    public Student(long id, String firstName, String lastName, int index, String login, String password) {
        this.id = id;
        this.firstName = firstName;
        this.lastName = lastName;
        this.index = index;
        this.login = login;
        this.password = password;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public int getIndex() {
        return index;
    }

    public void setIndex(int index) {
        this.index = index;
    }

    public String getLogin() {
        return login;
    }

    public void setLogin(String login) {
        this.login = login;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

}
