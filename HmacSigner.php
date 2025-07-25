<?php

/**
 * Class HmacSigner
 *
 * A utility class to generate and verify HMAC (Hash-based Message Authentication Code)
 * hashes using a configurable algorithm and secret key.
 *
 * Supports any algorithm available in hash_hmac_algos().
 */
class HmacSigner
{
    /**
     * @var string The secret key used for HMAC generation.
     */
    private string $secretKey;

    /**
     * @var string The hashing algorithm to use (e.g., 'sha256', 'sha512').
     */
    private string $hashAlgo;

    /**
     * HmacSigner constructor.
     *
     * @param string $secretKey The secret key for hashing.
     * @param string $hashAlgo The hashing algorithm (default: 'sha256').
     * @throws \RuntimeException If an invalid hash algorithm is provided.
     */
    public function __construct(string $secretKey = 'secret_key', string $hashAlgo = 'sha256')
    {
        $this->secretKey = $secretKey;

        $this->setHashAlgo($hashAlgo);
    }

    /**
     * Set the hashing algorithm to use.
     *
     * @param string $hashAlgo The desired hash algorithm.
     * @return void
     * @throws \RuntimeException If the algorithm is not supported.
     */
    public function setHashAlgo(string $hashAlgo): void
    {
        if (!$this->validateHashAlgo($hashAlgo)) {
            throw new \RuntimeException('Invalid Hash Algorithm provided!');
        }

        $this->hashAlgo = $hashAlgo;
    }

    /**
     * Generate an HMAC hash of the given string.
     *
     * @param string $data The input string to hash.
     * @return string The resulting HMAC hash.
     */
    public function encrypt(string $data): string
    {
        return hash_hmac($this->hashAlgo, $data, $this->secretKey);
    }

    /**
     * Verify that the given data matches the provided HMAC hash.
     *
     * @param string $data The original data to verify.
     * @param string $encryptedHash The HMAC hash to compare against.
     * @return bool True if the hashes match, false otherwise.
     */
    public function verify(string $data, string $encryptedHash): bool
    {
        return hash_equals($encryptedHash, $this->encrypt($data));
    }

    /**
     * Validate that the provided hash algorithm is supported.
     *
     * @param string $hashAlgo The hash algorithm to check.
     * @return bool True if valid, false otherwise.
     */
    private function validateHashAlgo(string $hashAlgo): bool
    {
        return in_array($hashAlgo, hash_hmac_algos());
    }
}
