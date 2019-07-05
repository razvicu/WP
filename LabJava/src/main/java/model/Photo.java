package main.java.model;

public class Photo {
    private Integer id;
    private Integer userId;
    private String title;
    private Integer votes;
    private String url;


    public Photo(Integer id, Integer userId, String title, Integer votes, String url) {
        this.id = id;
        this.userId = userId;
        this.title = title;
        this.votes = votes;
        this.url = url;
    }

    public Integer getId() {
        return id;
    }

    public Integer getUserId() {
        return userId;
    }

    public String getTitle() {
        return title;
    }

    public Integer getVotes() {
        return votes;
    }

    public String getUrl() {
        return url;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public void setVotes(Integer votes) {
        this.votes = votes;
    }

    public void setUrl(String url) {
        this.url = url;
    }
}
