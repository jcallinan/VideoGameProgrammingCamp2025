using UnityEngine;
using TMPro;
using UnityEngine.SceneManagement;

public class GameManager : MonoBehaviour
{
    public static GameManager instance;

    public TextMeshProUGUI scoreText;
    public TextMeshProUGUI timerText;

    public int totalGems = 10;
    private int collectedGems = 0;

    public float timeLimit = 300f; // 5 minutes
    private float timeRemaining;

    void Awake()
    {
        if (instance == null)
            instance = this;
        else
            Destroy(gameObject);
    }

    void Start()
    {
        timeRemaining = timeLimit;
        UpdateScoreText();
    }

    void Update()
    {
        timeRemaining -= Time.deltaTime;

        if (timerText != null)
            timerText.text = "Time: " + Mathf.CeilToInt(timeRemaining).ToString();

        if (timeRemaining <= 0)
            SceneManager.LoadScene("LoseScene");
    }

    public void AddGem(int amount)
    {
        collectedGems += amount;
        UpdateScoreText();

        if (collectedGems >= totalGems)
            SceneManager.LoadScene("WinScene");
    }

    void UpdateScoreText()
    {
        if (scoreText != null)
            scoreText.text = "Gems: " + collectedGems.ToString() + "/" + totalGems.ToString();
    }
}