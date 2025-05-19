using UnityEngine;

public class Collectible : MonoBehaviour
{
    public AudioClip sparkleSound;

    void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Player"))
        {
            GameManager.instance.AddGem(1);

            if (sparkleSound != null)
                AudioSource.PlayClipAtPoint(sparkleSound, transform.position);

            Destroy(gameObject);
        }
    }
}